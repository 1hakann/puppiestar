<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;


class PuppieController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('front.index',compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $prodFromSameCategory = Product::inRandomOrder()
        ->where('category_id',$product->category_id)
        ->where('id','!=',$product->id)
        ->limit(3)
        ->get();

        return view('front.product.show',compact('product','prodFromSameCategory'));    
    }

    public function allProduct($name, Request $request)
    {
        $category = Category::where('slug',$name)->first();
        $categoryId = $category->id;
        $filterSubCategories = $request->subcategory;
        $price = $request->price;
        if($request->subcategory) 
        {
            $products = $this->filterProducts($request);
            $filterSubCategories = $this->getSubcategoriesId($request);

        } elseif($request->min||$request->max){
            $products = $this->filterByPrice($request);
        } else {
           $products = Product::where('category_id',$category->id)->get();  
        }
        $subcategories = SubCategory::where('category_id',$category->id)->get();
        $slug = $name;
        return view('front.product.category',compact('products','subcategories','slug','filterSubCategories','price','categoryId')); 
    }

    public function filterProducts(Request $request)
    {   
        $subId = [];
        $subCategory = SubCategory::whereIn('id',$request->subcategory)->get();
        
        foreach ($subCategory as $sub) {
            array_push($subId, $sub->id);
        }
        $products = Product::whereIn('subcategory_id',$subId)->get();

        return $products;
    }

    public function getSubcategoriesId(Request $request)
    {   
        $subId = [];
        $subCategory = SubCategory::whereIn('id',$request->subcategory)->get();
        
        foreach ($subCategory as $sub) {
            array_push($subId, $sub->id);
        }

        return $subId;
    }

    public function filterByPrice(Request $request)
    {
        $categoryId = $request->categoryId;
        $product = Product::whereBetween('price',[$request->min,$request->max ])->where('category_id',$categoryId)->get();
        return $product;
    }
}
