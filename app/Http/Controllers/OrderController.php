<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    
    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        $product = Product::findOrFail($request->product_id);
        $totalPrice = $product->price * $request->quantity;
    
        Order::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);
    
        return redirect()->route('orders.create')->with('success', 'Order placed successfully.');
    }
}
