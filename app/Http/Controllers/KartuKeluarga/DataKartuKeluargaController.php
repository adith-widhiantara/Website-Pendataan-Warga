<?php

namespace App\Http\Controllers\KartuKeluarga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\KartuKeluarga;

class DataKartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $kartuKeluarga = KartuKeluarga::all();
      return view('data.kartuKeluarga.index', compact('kartuKeluarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('data.kartuKeluarga.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request -> validate([
        'nomorkk' => ['required', 'string', 'max:255'],
        'alamat' => ['required', 'string', 'max:255'],
        'kode_pos' => ['required', 'string', 'max:255'],
        'rt' => ['required', 'string', 'max:255'],
        'rw' => ['required', 'string', 'max:255'],
        'telepon_rumah' => ['required', 'string', 'max:255'],
      ]);

      $kartuKeluarga = KartuKeluarga::updateOrCreate(
        [
          'nomorkk' => $request -> nomorkk,
        ],
        [
          'alamat' => $request -> alamat,
          'kode_pos' => $request -> kode_pos,
          'rt' => $request -> rt,
          'rw' => $request -> rw,
          'telepon_rumah' => $request -> telepon_rumah,
        ]
      );

      return redirect()->route('kartukeluarga.index')->with('status', 'Data Kartu Keluarga Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nomorkk)
    {
      $kartuKeluarga = KartuKeluarga::where('nomorkk', $nomorkk)
                                    ->first();
      return view('data.kartuKeluarga.show', compact('kartuKeluarga'));
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
    public function update(Request $request, $nomorkk)
    {
      $request -> validate([
        'alamat' => ['required', 'string', 'max:255'],
        'kode_pos' => ['required', 'string', 'max:255'],
        'rt' => ['required', 'string', 'max:255'],
        'rw' => ['required', 'string', 'max:255'],
        'telepon_rumah' => ['required', 'string', 'max:255'],
      ]);

      $kartuKeluarga = KartuKeluarga::where('nomorkk', $nomorkk)
                                    ->update([
                                      'alamat' => $request -> alamat,
                                      'kode_pos' => $request -> kode_pos,
                                      'rt' => $request -> rt,
                                      'rw' => $request -> rw,
                                      'telepon_rumah' => $request -> telepon_rumah,
                                    ]);

      return back()->with('status', 'Data Kartu Keluarga Berhasil Diganti');
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
