<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddProduct;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Create a new product
        $product = AddProduct::create($validatedData);

        // Return a response
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }
    public function index()
    {
        $products = AddProduct::all();

        return response()->json([
            'success' => true,
            'data' => $products,
        ]);
    }

    /**
     * Get a single product by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $product = AddProduct::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product,
        ]);
    }

}

