<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;

class LoginController extends Controller
{
  public function login()
  {
    return view('auth.login');
  }

  public function store(Request $request)
  {
    $remember = $request -> remember;

    if (Auth::attempt(['nip' => $request -> nip, 'password' => $request -> password], $remember)) {
      Auth::logoutOtherDevices($request -> password);
      return redirect()->route('landing');
    } else {
      $findNip = User::where('nip', $request -> nip)->first();
      if (isset($findNip)) {
        return redirect()->route('login')->with('status', 'Password Salah!');
      } else {
        return redirect()->route('login')->with('status', 'NIP Belum Terdaftar!');
      }
    }
  }

  public function logout(Request $request)
  {
    Auth::logout();
    return redirect()->route('login');
  }
}
