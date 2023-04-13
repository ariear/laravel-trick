<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    public function index () {
        return view('autocomplete.index');
    }

    public function data (Request $request) {
        $results = User::where('name', 'LIKE', '%'.$request->get('query').'%')->get();

        return response()->json($results);
    }
}
