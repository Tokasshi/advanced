<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Phone;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class ExampleController extends Controller
{

    public function cv()
    {
        return view('cv');
    }
//////////////.............TASK THREE........................../////////////
//view contact us page
    public function contactus()
    {
        return view('contact');
    }
//extract the data and show it in anew page
    public function data()
    {
        $name = request('name');
        $email = request('email');
        $sub = request('sub');
        $mes = request('message');
        $data = 'the data you inserted is: ' . '<br>' . 'Name: ' . $name . '<br>' . 'E-mail:' . $email . '<br>' . 'Subject: ' . $sub . '<br>' . 'Message:' . $mes;
        return $data;
    }

    public function login()
    {
        return view('login');
    }

    public function recieve(Request $request)
    {
        return $request['email'] . '<br>' . $request['pwd'];

    }

    public function uploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }

    public function index()
    {
        return view('index');
    }  

    public function about()
    {
        return view('about');
    }  

    public function test(){
        dd(Student::find(1), Student::find(1)?->phone);
    }

    public function findt(){
        dd(Student::find(1), Student::find(1)?->phone);
    }
}
