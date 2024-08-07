<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\Common;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= Product::get();
        return view('index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|max:100',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data['published'] = isset($request->published);
        $data['image'] = $this->uploadFile($request->image, 'assets/images');
        Product::create($data);

        return 'data was inserted';
        // return redirect()->route('products.index');
    }

    // public function latest()
    // {
    //     //a5er 3 items added
    //     $products = Product::latest()->take(3)->get();
    //     return view('products.latest', compact('products'));
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}
