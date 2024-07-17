<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    function login() {
        return view('login');
    }

    function cv() {
        return view('cv');
    }
//////////////.............TASK THREE........................../////////////
//view contact us page
    function contactus(){
        return view('contact');
    }
//extract the data and show it in anew page
    function data(){
    $name= request('name');
    $email = request('email');
    $sub = request('sub');
    $mes= request('message');
    $data = 'the data you inserted is: ' . '<br>' . 'Name: '. $name . '<br>' . 'E-mail:' .$email . '<br>' . 'Subject: '.$sub . '<br>'. 'Message:'.$mes;
    return $data;   
    }

}