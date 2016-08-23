<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Suggestion;

class SuggestionController extends Controller
{
  public function index(){
    return view('home.suggestion');
  }

  public function store(Request $request){
    Suggestion::create($request->all());

    return view('home.suggestion-success');
  }
}
