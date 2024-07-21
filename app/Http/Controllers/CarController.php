<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_cars');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carTitle ="Bmw";
        $price =12;
        $description="Test";
        $published=true;
        
        car::create([
            'carTitle'=> $carTitle,
            'price'=>$price,
            'description'=>$description,
            'published'=>$published,
        ]);

        return "data added successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
