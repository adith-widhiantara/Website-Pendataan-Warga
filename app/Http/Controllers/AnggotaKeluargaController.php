<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\KartuKeluarga;
use App\AnggotaKeluarga;

class AnggotaKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nomorkk)
    {
      $kartuKeluarga = KartuKeluarga::where('nomorkk', $nomorkk)->first();
      return view('data.anggotaKeluarga.create', compact('kartuKeluarga'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $nomorkk)
    {
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

      if ( $request -> status_hubungan_dengan_kepala_keluargas_id == 1 ) {
        KartuKeluarga::where('id', $findKK -> id)
                      ->update([
                        'kepala_keluarga_id' => $anggotaKeluarga -> id,
                      ]);
      }

      return redirect()->route('kartukeluarga.show', $nomorkk)->with('status', 'Anggota Keluarga Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nomorkk, $nomor_ktp)
    {
      $anggotaKeluarga = AnggotaKeluarga::where('nomor_ktp', $nomor_ktp)->first();
      $kartuKeluarga = KartuKeluarga::where('nomorkk', $nomorkk)->first();

      return view('data.anggotaKeluarga.show', compact('anggotaKeluarga', 'kartuKeluarga'));
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
    public function update(Request $request, $nomorkk, $nomor_ktp)
    {
      AnggotaKeluarga::where('nomor_ktp', $nomor_ktp)
                      ->update([
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
                      ]);

      return redirect()->route('kartukeluarga.show', $nomorkk)->with('status', 'Data Anggota Keluarga Berhasil Diganti!');
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
