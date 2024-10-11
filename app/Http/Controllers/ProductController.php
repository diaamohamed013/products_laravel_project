<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('site.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        return redirect()->back()->with('success','Stored Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('site.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('site.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());
        return redirect('products')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
}
