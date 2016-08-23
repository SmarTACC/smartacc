<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function generalLogin()
  {
    return view('auth.general-login');
  }

  public function generalRegister()
  {
    return view('auth.general-register');
  }
}