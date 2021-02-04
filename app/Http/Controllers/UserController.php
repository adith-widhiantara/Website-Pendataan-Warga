<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = DB::table('users')
                ->whereNotIn('nip', ['admin'])
                ->get();
      return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showAuth($nip)
    {
      return view('user.read');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nip)
    {
      $request -> validate([
        'name' => ['string', 'max:255'],
        'photo' => ['image'],
      ]);

      if ( isset($request -> photo) ) {
        $photo = $request->file('photo');
        $namaPhoto = time() . $photo->getClientOriginalName();
        $tujuan_upload = 'img/profil';
        $photo->move($tujuan_upload, $namaPhoto);

        User::where('nip', $nip)
            ->update([
              'photo' => $namaPhoto,
            ]);
      }

      if ( isset($request -> password) ) {
        $request -> validate([
          'password' => ['string', 'min:8', 'confirmed'],
        ]);
      }

      User::where('nip', $nip)
          ->update([
            'name' => $request -> name,
            'password' => Hash::make($request -> password),
          ]);

      return back()->with('status', 'Data Sudah Disimpan!');
    }

    public function konfirmasi($nip)
    {
      User::where('nip', $nip)
          ->update([
            'nip_verified_at' => Carbon::now(),
          ]);

      return back();
    }

    public function batalKonfirmasi($nip)
    {
      User::where('nip', $nip)
          ->update([
            'nip_verified_at' => null,
          ]);

      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
