<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;
use App\Models\Car;
use App\Models\Category;


class CarController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars= Car::with('category')->get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =Category::select('id','catName')->get();
        return view('add_cars', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric',
            'catId' =>'required|exists:categories,id',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $data['published'] = isset($request->published);
        $data['image'] = $this->uploadFile($request->image, 'assets/images/cars');
        Car::create($data);

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car= Car::with('Category')->findOrFail($id);
        return view('car_details', compact('car',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories =Category::select('id','catName')->get();
        $car= Car::findOrFail($id);
        return view('edit_car', compact('car', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $data = $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric',
            'catId' =>'required|exists:categories,id',
            'image' => 'sometimes|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $data['published'] = isset($request->published);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/images');
        }// dd($data);

        Car::where('id', $id)->update($data);
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) 
    {
        car:: where('id', $id)->delete();
        return redirect()-> route('cars.index');
    }

    public function showDelete()
    {
        $cars= car:: onlyTrashed()-> get();

        return view('trashedCars', compact('cars'));
    }

    public function restore(string $id)
    {
        car:: where('id', $id)->restore();
        return redirect()-> route('cars.index');
    }

    public function forceDelete(string $id) 
    {
        car:: where('id', $id)->forceDelete();
        return redirect()-> route('cars.index');
    }
}
