<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
// use GuzzleHttp\Psr7\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $products = Product::latest()->paginate(3);
        return view('products.index', compact('products'));
        // return view('index', [
        //     'products' => Product::latest()->paginate(3)
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) : RedirectResponse
    {
        Product::create($request->all());
        return redirect()->route('products.index')
                ->withSuccess('New product is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id) : View
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id) : View
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id) : RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')
                ->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id) : RedirectResponse
    {
        $product = Product::find($id); 
        $product->delete();
        return redirect()->route('products.index')
                ->withSuccess('Product is deleted successfully.');
    }
}