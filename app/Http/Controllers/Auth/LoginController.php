<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    $findNip = User::where('nip', $request -> nip)->first();

    if (isset($findNip->nip_verified_at) && Auth::attempt(['nip' => $request -> nip, 'password' => $request -> password], $remember)) {
      // Auth::logoutOtherDevices($request -> password);
      User::where('nip', $request -> nip)
          ->update([
            'resetpassword' => 1
          ]);
      return redirect()->route('landing');
    } else {
      if (isset($findNip)) {
        if (isset($findNip->nip_verified_at)) {
          return redirect()->route('login')->with('status', 'Password Salah!');
        } else {
          return redirect()->route('login')->with('status', 'NIP Belum Dikonfirmasi!');
        }
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

  public function forgetPassword()
  {
    return view('auth.forgetPassword');
  }

  public function forgetPasswordStore(Request $request)
  {
    $request -> validate([
      'nip' => ['required', 'string', 'max:255'],
    ]);

    $findNip = User::where('nip', $request -> nip)->first();

    if (isset($findNip)) {
      User::where('nip', $request -> nip)
          ->update([
            'resetpassword' => 2,
          ]);

      return redirect()->route('login')->with('status', 'Reset Password Berhasil Dikirim');
    } else {
      return redirect()->route('login')->with('status', 'NIP tidak ditemukan');
    }
  }

  public function sendPassword($nip)
  {
    User::where('nip', $nip)
        ->update([
          'password' => Hash::make("12345678"),
          'resetpassword' => 1
        ]);

    return back()->with('status', 'Profil Berhasil Reset Password');
  }
}
