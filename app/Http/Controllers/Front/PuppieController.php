<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class PuppieController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('front.index',compact('products'));
    }

    public function show($id)
    {
        $productt = Product::find($id);

        $products = Product::latest()->limit(9)->get();
        $randomActiveProducts = Product::inRandomOrder()->limit(4)->get();
        $randomActiveProductId = [];
        foreach ($randomActiveProducts as $product) {
            array_push($randomActiveProductId, $product->id);
        }

        $randomItemProducts = Product::whereNotIn('id',$randomActiveProductId)->limit(4)->get();
        return view('front.product.show',compact('productt','products','randomItemProducts','randomActiveProducts'));
    }
}
