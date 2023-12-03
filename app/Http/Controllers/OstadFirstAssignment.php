<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OstadFirstAssignment extends Controller
{
    public function shopDetails() {
        $shop = Auth::user();

        // Fetch shop details
        $shopData = $shop->api()->rest('GET', '/admin/api/2023-10/shop.json');

        // Extract the shop details from the response
        $shopDetails = $shopData['body']->shop;

        // Prepare the data to send to the view
        $shopInfo = [
            'name' => $shopDetails->name,
            'id' => $shopDetails->id
        ];

        // Pass the data to the view
        return view('shop', compact('shopInfo'));
    }

    public function collectionsDetails() {
        $shop = Auth::user();

        // Fetch collection details
        $collectionsData = $shop->api()->rest('GET', '/admin/api/2023-10/custom_collections.json');

        // Extract the collection details from the response
        $collections = $collectionsData['body']->custom_collections;

        // dd($collections);

        // Pass the data to the view
        return view('collections', compact('collections'));
    }

    public function createCollection(Request $request) {
        if ($request->isMethod('post')) {
            $shop = Auth::user();


            // Prepare the data for the new collection
            $newCollectionData = [
                'custom_collection' => [
                    'title' => $request->title,
                    'body_html' => $request->body_html
                ]
            ];


            // Create the new collection using the Shopify API
            $response = $shop->api()->rest('POST', '/admin/api/2023-10/custom_collections.json', $newCollectionData);

            if ($response['errors']) {
                // Handle errors here
                return back()->withErrors('Error creating collection: ' . $response['errors']);
            }

            // If successful, return a success message
            return back()->with('success', 'Collection created successfully!');
        } else {
            // When a GET request is made, show the create_collection view
            return view('create_collection');
        }
    }

    public function showEditForm($collectionId) {
        $shop = Auth::user();

        // Fetch collection details for the edit form
        $response = $shop->api()->rest('GET', '/admin/api/2023-10/custom_collections/'.$collectionId.'.json');

        if (!empty($response['errors'])) {
            return back()->withErrors('Error fetching collection details: ' . $response['errors']);
        }

        $collectionDetails = $response['body']->custom_collection;

        // Show the edit collection view with collection details
        return view('edit_collection', compact('collectionDetails'));
    }

    public function editCollection(Request $request, $collectionId) {
        $shop = Auth::user();

        // Validate request data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'body_html' => 'required|string',
        ]);

        // Prepare the data for updating the collection
        $updateData = [
            'custom_collection' => [
                'id' => $collectionId,
                'title' => $request->title,
                'body_html' => $request->body_html,
            ]
        ];

        // Update the collection using Shopify API
        $response = $shop->api()->rest('PUT', '/admin/api/2023-10/custom_collections/'.$collectionId.'.json', $updateData);

        // Handle the response, check for errors
        if (!empty($response['errors'])) {
            return back()->withErrors('Error updating collection: ' . $response['errors']);
        }

        // Redirect with success message
        return back()->with('success', 'Collection updated successfully!');
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

    public function editProduct($productId) {
        $shop = Auth::user();

        // Fetch the product details using Shopify API
        $response = $shop->api()->rest('GET', '/admin/api/2023-10/products/'.$productId.'.json');

        if (!empty($response['errors'])) {
            return back()->withErrors('Error fetching product details: ' . $response['errors']);
        }

        $productDetails = $response['body']->product;

        // Show the edit product view with product details
        return view('edit_product', compact('productDetails'));
    }

    public function createProduct() {
        // Display the product creation form
        return view('create_product');
    }


}

