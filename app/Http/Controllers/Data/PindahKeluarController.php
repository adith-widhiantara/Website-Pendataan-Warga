<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\KartuKeluarga;
use App\AnggotaKeluarga;
use App\DataPindahKeluar;

class PindahKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dataPindahKeluar = DataPindahKeluar::orderBy('id', 'desc')
        ->get();

      return view('data.dataPindahKeluar.index', compact('dataPindahKeluar'));
    }

    public function findNomorkk(Request $request)
    {
      return redirect()->route('datapindahkeluar.create', $request->nomorkk);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create($nomorkk)
     {
       $dataKartuKeluarga = KartuKeluarga::where('nomorkk', $nomorkk)->first();

       return view('data.dataPindahKeluar.create', compact('dataKartuKeluarga'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      DataPindahKeluar::create([
        'tanggal_melapor' => Carbon::now(),
        'anggota_keluarga_id' => $request -> anggota_keluarga_id,
        'tanggal_surat' => $request -> tanggal_surat,
        'nomor_surat' => $request -> nomor_surat,
        'alamat_tujuan' => $request -> alamat_tujuan,
        'keterangan' => $request -> keterangan,
      ]);

      AnggotaKeluarga::where('id', $request -> anggota_keluarga_id)
        ->update([
          'status' => 3,
        ]);

      return redirect()->route('datapindahkeluar.index')->with('status', 'Data Pindah Keluar Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DataPindahKeluar $DataPindahKeluar)
    {
      return view('data.dataPindahKeluar.show', compact('DataPindahKeluar'));
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
