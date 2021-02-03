<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\User;

class RegisterController extends Controller
{
  public function register()
  {
    return view('auth.register');
  }

  public function store(Request $request)
  {
    $request -> validate([
      'name' => ['required', 'string', 'max:255'],
      'nip' => ['required', 'string', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = User::create([
      'name' => $request -> name,
      'nip' => $request -> nip,
      'password' => Hash::make($request -> password),
    ]);

    if (Auth::attempt(['nip' => $request->nip, 'password' => $request -> password])) {
      return redirect()->route('landing');
    }
  }
}
