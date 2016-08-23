<?php

namespace App\Http\Controllers\Panel;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;
use App\Http\Requests\Panel\LoginRequest;
use App\PanelUser;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

  use AuthenticatesAndRegistersUsers, ThrottlesLogins;

  protected $redirectPath = '/';

  public function __construct()
  {
    $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
  }

  public function login()
  {
    return view('auth.panel.login');
  }

  public function logout()
  {
    Auth::logout();
    return redirect('/');
  }

  protected function storeLogin(LoginRequest $request)
  {
    //dd($request);
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      dd('a');
      return redirect($this->redirectPath());
    }

    return view('auth.panel.login');
  }
}
