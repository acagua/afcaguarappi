<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class punto1Controller extends Controller
{
    //
    function index()
    {
    	return view('pages.punto1');
    }
    function process($entrada)
    {
    	$entrada = "";
    	//procesamiento del cubo

    	$resultado="";

    	return view('pages.punto1')->with([
    		'input'=>$entrada,
    		'output'=>$resultado
    		]);
    }

}
