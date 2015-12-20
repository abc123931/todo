<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function index() {
    	return view('ajax_practice/index');
    }

    public function ajax(Request $request) {

    	return response()->json(['name' => $request->name]); 
    }
}
