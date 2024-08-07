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
        $classes= classe::get();
        return view('classes', compact('classes'));
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
        $data = $request->validate([
            'className' => 'required|string',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric',
            'capacity' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'assets/images';
            $request->image->move($path, $file_name);
            $data['image'] = $path . '/' . $file_name;
        } else {
            unset($data['image']); //lw mfesh image uploaded
        }
    
        $data['full'] = isset($request->full);
    
        Classe::create($data);
    
        return redirect()->route('classes.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class= Classe::findOrFail($id);
        return view('class_details', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class= classe::findOrFail($id);
        return view('edit_class', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    
        $data= $request->validate([
            'className'=>'required|string',
            'description'=>'required|string|max:500',
            'price'=>'required| numeric',
            'capacity'=>'required| numeric',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'assets/images';
            $request->image->move($path, $file_name);
            $data['image'] = $path . '/' . $file_name;
        }

        $data['full']= isset($request->full);

        dd($request->all(), $data); //msh sh8ala brdo

        Classe::where('id', $id)->update($data);
        return redirect()-> route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        classe:: where('id', $id)->delete();
        return redirect()-> route('classes.index');
    }

    public function showDelete()
    {
        $classes= Classe:: onlyTrashed()-> get();

        return view('trashedClasses', compact('classes'));
    }

    public function restore(string $id)
    {
        classe:: where('id', $id)->restore();
        return redirect()-> route('classes.index');
    }

    public function forceDelete(string $id) 
    {
        classe:: where('id', $id)->forceDelete();
        return redirect()-> route('classes.index');
    }
}
