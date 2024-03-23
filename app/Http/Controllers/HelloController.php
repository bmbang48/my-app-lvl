<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //index
    function index()
    {
        echo  "Hello";
    }
    function world_message()
    {
        echo "World";
    }
    function create()
    {
        echo "Create";
    }
}
