<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClassController extends Controller
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
        return view('add_classes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $className ="English";
        $price =20;
        $description="testing task 4";
        $full=true;
        $capacity =25;
        
        Classe::create([
            'className'=> $className,
            'price'=>$price,
            'description'=>$description,
            'full'=>$full,
            'capacity'=>$capacity,
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
