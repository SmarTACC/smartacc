<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Http\Requests;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{

  use AuthenticatesAndRegistersUsers, ThrottlesLogins;

  protected $redirectPath = '/';

  public function __construct()
  {
    $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
  }

  public function redirectToProvider($provider)
  {
    return Socialite::driver($provider)->redirect();
  }

  public function handleProviderCallback($provider)
  {
    $user = Socialite::driver($provider)->user();

    $data = [
      'name' => $user->getName(),
      'email' => $user->getEmail()
    ];

    Auth::login(User::firstOrCreate($data));

    return redirect($this->redirectPath());
  }

  public function login()
  {
    return view('auth.login');
  }

  public function logout()
  {
    Auth::logout();
    return redirect('/');
  }

  public function register()
  {
    return view('auth.register');
  }

  protected function storeLogin(LoginRequest $request)
  {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect($this->redirectPath());
    }

    return view('auth.login');
  }

  protected function storeRegister(RegisterRequest $request)
  {
    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);

    Auth::login($user);

    return redirect($this->redirectPath());
  }
}
