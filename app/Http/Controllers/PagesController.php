<?php

// https://www.w3schools.com/php/php_namespaces.asp
namespace App\Http\Controllers;

// Import libraries
use Illuminate\Http\Request;

// PagesController inherits the Controller Class. https://www.php.net/manual/en/language.oop5.inheritance.php 
class PagesController extends Controller
{
    // public means we can access it from outside of the class
    public function index(){
        $title = 'Welcome to Laravel!';
        // return view('pages.index', compact('title')); // compact sends $title to the view
        return view('pages.index')->with('title', $title); // 'nameofvariableinview', $localvariable
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title); // looks for resources/views/pages/about.blade.php
    }

    // returning an array to a view
    public function services(){
        // associative array. Has key-value pairs
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO'] //example of nested arrays
        );
        return view('pages.services')->with($data);
    }
}
