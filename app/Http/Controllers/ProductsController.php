<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {

    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {

        $data = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:3000',
            'condition' => 'required|in:New,Used,Broken',
            'currency' => 'required|in:dinar,euro',
            'price' => 'required',
            'images' => 'required',
            'images.*' => 'image|max:2048'
        ]);

        $product = Product::create([
            'profile_id' => auth()->user()->id,
            'category_id' => 1,
            'name' => $data['name'],
            'description' => $data['description'],
            'condition' => $data['condition'],
            'price' => $data['price'],
            'currency' => $data['currency'],
        ]);

        $images = $data['images'];

        foreach($images as $image) {
            $imagePath = $image->store('uploads', 'public');
            Image::create([
                'product_id' => $product->id,
                'image' => $imagePath,
            ]);
        }

        return redirect(route('product.show', $product->id));
    }

    public function show(Product $product) {
        return view('products.show', [
            'product' => $product,
        ]);
    }
}
