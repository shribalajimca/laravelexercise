<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products',$products));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:products',
            'amount' => 'required|numeric',
            'company' => 'required',
            'available' => 'required',
            'description' => 'required',
        ]);

        Product::create($request->all());

        return redirect('/products');

    }
}
