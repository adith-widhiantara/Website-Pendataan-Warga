<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\DataKematian;
use App\KartuKeluarga;
use App\AnggotaKeluarga;

class KematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dataKematian = DataKematian::orderBy('id', 'desc')->get();

      return view('data.dataKematian.index', compact('dataKematian'));
    }

    public function findNomorkk(Request $request)
    {
      return redirect()->route('datakematian.create', $request->nomorkk);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nomorkk)
    {
      $dataKartuKeluarga = KartuKeluarga::where('nomorkk', $nomorkk)->first();

      return view('data.dataKematian.create', compact('dataKartuKeluarga'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $nomorkk)
    {
      DataKematian::create([
        'tanggal_melapor' => Carbon::now(),
        'nama_pelapor_id' => $request -> nama_pelapor_id,
        'anggota_keluarga_id' => $request -> anggota_keluarga_id,
        'tanggal_meninggal' => $request -> tanggal_meninggal,
        'tempat_meninggal' => $request -> tempat_meninggal,
        'sebab_kematian' => $request -> sebab_kematian,
        'keterangan' => $request -> keterangan,
      ]);

      AnggotaKeluarga::where('id', $request->anggota_keluarga_id)
        ->update([
          'status' => 2
        ]);

      return redirect()->route('datakematian.index')->with('status', 'Data Kematian Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DataKematian $DataKematian)
    {
      return view('data.dataKematian.show', compact('DataKematian'));
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
    public function update(Request $request, $id)
    {
        //
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
