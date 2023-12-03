<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;

class FaqController extends Controller
{
    public function groupIndex(): View
    {
        $groups = Group::where('shop_id', auth()->user()->id)->get();
        return view('group', compact('groups'));
    }


    public function groupStore(Request $request)
    {

        $group = new Group();

        $group->name = $request->name;
        $group->description = $request->description;
        $group->shop_id = auth()->user()->id;
        $group->status = 1;

        $group->save();

        return Redirect::tokenRedirect('group.index'); //redirect not working

    }

    public function collectionProducts($collectionId) {
        $shop = Auth::user();

        // Fetch products for the specified collection
        $response = $shop->api()->rest('GET', '/admin/api/2023-10/products.json', ['collection_id' => $collectionId]);

        if (!empty($response['errors'])) {
            return back()->withErrors('Error fetching products: ' . $response['errors']);
        }

        $products = $response['body']->products;

        // Show a view with the products
        return view('collection_products', compact('products'));
    }

}
