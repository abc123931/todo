<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\State;

class StatesController extends Controller
{
    public function index() {
    	$todos = State::orderBy('id', 'desc')->get();
    	return view('todos/index', compact('todos'));
    }

    public function ajax(Request $request) {

            $states = State::find($request->id);
            if($states->state === 1) {
                $states->state = 0;
            }else {
                $states->state = 1;
            }

            $states->save();

            $state = State::where('id', $request->id)->first();

            return response()->json([
                'state' => $state->state,
                'title' => $state->title
                ]);
    	
    }


    
    

    private function _create() {
    	
    }

    private function _delete() {
    	
    }
}
