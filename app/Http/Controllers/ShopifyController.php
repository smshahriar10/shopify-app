<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopifyController extends Controller
{
    function getDetails(Request $request){
        $shop = $request->user();
        $data = $shop->api()->rest('GET', '/admin/products.json');
        $products = $data['body']->products;
        return view('welcome2', compact('products'));
    }
}
