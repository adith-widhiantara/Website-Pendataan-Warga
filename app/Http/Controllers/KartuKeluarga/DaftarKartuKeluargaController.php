<?php

namespace App\Http\Controllers\KartuKeluarga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Gelar;
use App\GolonganDarah;
use App\Agama;
use App\StatusPerkawinan;
use App\StatusHubunganDenganKepalaKeluarga;
use App\PenyandangCatat as PenyandangCacat;
use App\PendidikanTerakhir;
use App\Pekerjaan;

class DaftarKartuKeluargaController extends Controller
{
  public function gelarIndex()
  {
    $gelar = Gelar::all();
    return view('daftarKartuKeluarga.gelar.index', compact('gelar'));
  }

  public function gelarStore(Request $request)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:gelars'],
    ]);

    Gelar::create([
      'keterangan' => $request -> keterangan,
    ]);

    return back()->with('status', 'Gelar Berhasil Ditambahkan');
  }

  public function gelarUpdate(Request $request, Gelar $gelar)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:gelars'],
    ]);

    Gelar::where('id', $gelar->id)
          ->update([
            'keterangan' => $request -> keterangan,
          ]);

    return back()->with('status', 'Gelar Berhasil Diubah');
  }

  public function darahIndex()
  {
    $darah = GolonganDarah::all();
    return view('daftarKartuKeluarga.golonganDarah.index', compact('darah'));
  }

  public function darahStore(Request $request)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:golongan_darahs'],
    ]);

    GolonganDarah::create([
      'keterangan' => $request -> keterangan,
    ]);

    return back()->with('status', 'Golongan Darah Berhasil Ditambahkan');
  }

  public function darahUpdate(Request $request, GolonganDarah $golongandarah)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:golongan_darahs'],
    ]);

    GolonganDarah::where('id', $golongandarah->id)
          ->update([
            'keterangan' => $request -> keterangan,
          ]);

    return back()->with('status', 'Golongan Darah Berhasil Diubah');
  }

  public function agamaIndex()
  {
    $agama = Agama::all();
    return view('daftarKartuKeluarga.agama.index', compact('agama'));
  }

  public function agamaStore(Request $request)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:agamas'],
    ]);

    Agama::create([
      'keterangan' => $request -> keterangan,
    ]);

    return back()->with('status', 'Agama Berhasil Ditambahkan');
  }

  public function agamaUpdate(Request $request, Agama $agama)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:agamas'],
    ]);

    Agama::where('id', $agama->id)
          ->update([
            'keterangan' => $request -> keterangan,
          ]);

    return back()->with('status', 'Agama Berhasil Diubah');
  }

  public function statusPerkawinanIndex()
  {
    $statusPerkawinan = StatusPerkawinan::all();
    return view('daftarKartuKeluarga.statusPerkawinan.index', compact('statusPerkawinan'));
  }

  public function statusPerkawinanStore(Request $request)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:status_perkawinans'],
    ]);

    StatusPerkawinan::create([
      'keterangan' => $request -> keterangan,
    ]);

    return back()->with('status', 'Status Perkawinan Berhasil Ditambahkan');
  }

  public function statusPerkawinanUpdate(Request $request, StatusPerkawinan $statusPerkawinan)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:status_perkawinans'],
    ]);

    StatusPerkawinan::where('id', $statusPerkawinan->id)
                    ->update([
                      'keterangan' => $request -> keterangan,
                    ]);

    return back()->with('status', 'Status Perkawinan Berhasil Diubah');
  }

  public function statusHubunganIndex()
  {
    $statusHubungan = StatusHubunganDenganKepalaKeluarga::all();
    return view('daftarKartuKeluarga.statusHubungan.index', compact('statusHubungan'));
  }

  public function statusHubunganStore(Request $request)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:status_hubungan_dengan_kepala_keluargas'],
    ]);

    StatusHubunganDenganKepalaKeluarga::create([
      'keterangan' => $request -> keterangan,
    ]);

    return back()->with('status', 'Status Hubungan Berhasil Ditambahkan');
  }

  public function statusHubunganUpdate(Request $request, $statusHubungan)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:status_hubungan_dengan_kepala_keluargas'],
    ]);

    StatusHubunganDenganKepalaKeluarga::where('id', $statusHubungan)
                    ->update([
                      'keterangan' => $request -> keterangan,
                    ]);

    return back()->with('status', 'Status Hubungan Berhasil Diubah');
  }

  public function penyandangCacatIndex()
  {
    $penyandangCacat = PenyandangCacat::all();
    return view('daftarKartuKeluarga.penyandangCacat.index', compact('penyandangCacat'));
  }

  public function penyandangCacatStore(Request $request)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:penyandang_catats'],
    ]);

    PenyandangCacat::create([
      'keterangan' => $request -> keterangan,
    ]);

    return back()->with('status', 'Penyandang Cacat Berhasil Ditambahkan');
  }

  public function penyandangCacatUpdate(Request $request, PenyandangCacat $penyandangCacat)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:penyandang_catats'],
    ]);

    PenyandangCacat::where('id', $penyandangCacat -> id)
                    ->update([
                      'keterangan' => $request -> keterangan,
                    ]);

    return back()->with('status', 'Penyandang Cacat Berhasil Diubah');
  }

  public function pendidikanTerakhirIndex()
  {
    $pendidikanTerakhir = PendidikanTerakhir::all();
    return view('daftarKartuKeluarga.pendidikanTerakhir.index', compact('pendidikanTerakhir'));
  }

  public function pendidikanTerakhirStore(Request $request)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:pendidikan_terakhirs'],
    ]);

    PendidikanTerakhir::create([
      'keterangan' => $request -> keterangan,
    ]);

    return back()->with('status', 'Pendidikan Terakhir Berhasil Ditambahkan');
  }

  public function pendidikanTerakhirUpdate(Request $request, PendidikanTerakhir $pendidikanTerakhir)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:pendidikan_terakhirs'],
    ]);

    PendidikanTerakhir::where('id', $pendidikanTerakhir -> id)
                    ->update([
                      'keterangan' => $request -> keterangan,
                    ]);

    return back()->with('status', 'Pendidikan Terakhir Berhasil Diubah');
  }

  public function pekerjaanIndex()
  {
    $pekerjaan = Pekerjaan::all();
    return view('daftarKartuKeluarga.pekerjaan.index', compact('pekerjaan'));
  }

  public function pekerjaanStore(Request $request)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:pekerjaans'],
    ]);

    Pekerjaan::create([
      'keterangan' => $request -> keterangan,
    ]);

    return back()->with('status', 'Pekerjaan Berhasil Ditambahkan');
  }

  public function pekerjaanUpdate(Request $request, Pekerjaan $pekerjaan)
  {
    $request -> validate([
      'keterangan' => ['required', 'string', 'max:255', 'unique:pekerjaans'],
    ]);

    Pekerjaan::where('id', $pekerjaan -> id)
                    ->update([
                      'keterangan' => $request -> keterangan,
                    ]);

    return back()->with('status', 'Pekerjaan Berhasil Diubah');
  }
}
