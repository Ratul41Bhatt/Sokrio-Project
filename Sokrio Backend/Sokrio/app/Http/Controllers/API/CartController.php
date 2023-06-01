<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
        // Get the authenticated user's ID
        $userId = auth()->user()->id;

        $cartItem = Cart::create([
            'user_id' => $userId,
            'product_id' => $request->input('productId'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('totalPrice'),
            // Include any other necessary fields
        ]);

        // Return a response or perform additional actions as needed
        return response()->json(['message' => 'Product added to cart', 'cartItem' => $cartItem]);
    }
}
