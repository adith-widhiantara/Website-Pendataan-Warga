<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\KartuKeluarga;
use App\AnggotaKeluarga;
use App\DataPindahDatang;

class PindahDatangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dataPindahDatang = DataPindahDatang::orderBy('id', 'desc')
        ->get();

      return view('data.dataPindahDatang.index', compact('dataPindahDatang'));
    }

    public function findNomorkk(Request $request)
    {
      return redirect()->route('datapindahdatang.create', $request->nomorkk);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nomorkk)
    {
      $dataKartuKeluarga = KartuKeluarga::where('nomorkk', $nomorkk)->first();

      return view('data.dataPindahDatang.create', compact('dataKartuKeluarga'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $nomorkk)
    {
      $request -> validate([
        'nama' => ['required', 'string', 'max:255', 'unique:anggota_keluargas'],
        'gelars_id' => ['required'],
        'nomor_ktp' => ['unique:anggota_keluargas'],
        'jenis_kelamin' => ['required'],
        'tempat_lahir' => ['required'],
        'tanggal_bulan_tahun_lahir' => ['required'],
        'surat_lahir' => ['required'],
        'golongan_darahs_id' => ['required'],
        'agamas_id' => ['required'],
        'status_perkawinans_id' => ['required'],
        'buku_nikah' => ['required'],
        'surat_cerai' => ['required'],
        'status_hubungan_dengan_kepala_keluargas_id' => ['required'],
        'kelainan_fisik' => ['required'],
        'penyandang_cacats_id' => ['required'],
        'pendidikan_terakhirs_id' => ['required'],
        'pekerjaans_id' => ['required'],
        'nama_ibu' => ['required'],
        'nama_ayah' => ['required'],
        'alamat_asal' => ['required'],
        'tanggal_surat' => ['required'],
        'nomor_surat' => ['required'],
      ]);

      $findKK = KartuKeluarga::where('nomorkk', $nomorkk)->first();

      $anggotaKeluarga = AnggotaKeluarga::create([
        'kartu_keluarga_id' => $findKK -> id,
        'nama' => $request -> nama,
        'gelars_id' => $request -> gelars_id,
        'nomor_ktp' => $request -> nomor_ktp,
        'jenis_kelamin' => $request -> jenis_kelamin,
        'tempat_lahir' => $request -> tempat_lahir,
        'tanggal_bulan_tahun_lahir' => $request -> tanggal_bulan_tahun_lahir,
        'surat_lahir' => $request -> surat_lahir,
        'nomor_surat_lahir' => $request -> nomor_surat_lahir,
        'golongan_darahs_id' => $request -> golongan_darahs_id,
        'agamas_id' => $request -> agamas_id,
        'kepercayaan_terhadap_tuhan_yang_maha_esa' => $request -> kepercayaan_terhadap_tuhan_yang_maha_esa,
        'status_perkawinans_id' => $request -> status_perkawinans_id,
        'buku_nikah' => $request -> buku_nikah,
        'nomor_buku_nikah' => $request -> nomor_buku_nikah,
        'tanggal_perkawinan' => $request -> tanggal_perkawinan,
        'surat_cerai' => $request -> surat_cerai,
        'nomor_surat_cerai' => $request -> nomor_surat_cerai,
        'tanggal_perceraian' => $request -> tanggal_perceraian,
        'status_hubungan_dengan_kepala_keluargas_id' => $request -> status_hubungan_dengan_kepala_keluargas_id,
        'kelainan_fisik' => $request -> kelainan_fisik,
        'penyandang_cacats_id' => $request -> penyandang_cacats_id,
        'pendidikan_terakhirs_id' => $request -> pendidikan_terakhirs_id,
        'pekerjaans_id' => $request -> pekerjaans_id,
        'nik_ibu' => $request -> nik_ibu,
        'nama_ibu' => $request -> nama_ibu,
        'nik_ayah' => $request -> nik_ayah,
        'nama_ayah' => $request -> nama_ayah,
        'users_id' => Auth::user()->id,
      ]);

      DataPindahDatang::create([
        'tanggal_melapor' => Carbon::now(),
        'anggota_keluarga_id' => $anggotaKeluarga -> id,
        'alamat_asal' => $request -> alamat_asal,
        'tanggal_surat' => $request -> tanggal_surat,
        'nomor_surat' => $request -> nomor_surat,
        'keterangan' => $request -> keterangan,
      ]);

      return redirect()->route('datapindahdatang.index')->with('status', 'Tambah Data Pindah Datang Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DataPindahDatang $DataPindahDatang)
    {
      return view('data.dataPindahDatang.show', compact('DataPindahDatang'));
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
