@extends('base.base')

@section('title', $anggotaKeluarga->nama)

@section('style')
  <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('breadcrumb')
  {{ Breadcrumbs::render('anggotakeluarga.show', $anggotaKeluarga) }}
@endsection

@section('base')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Detail Anggota Keluarga
      </h3>
    </div>
    <form action="{{ route('anggotakeluarga.update', [ $kartuKeluarga -> nomorkk, $anggotaKeluarga -> nomor_ktp ]) }}" method="post">
      @csrf
      @method('patch')
      <div class="card-body">

        @if ( $anggotaKeluarga -> status == 2 )
          <div class="alert alert-danger" role="alert">
            Anggota keluarga ini sudah meninggal!
          </div>
        @elseif ( $anggotaKeluarga -> status == 3 )
          <div class="alert alert-danger" role="alert">
            Anggota keluarga ini sudah pindah keluar!
          </div>
        @endif

        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div class="alert alert-warning" role="alert">
              {{ $error }}
            </div>
          @endforeach
        @endif

        <div class="form-group">
          <label>
            Nama
          </label>
          <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" value="{{ $anggotaKeluarga -> nama }}">
        </div>

        <div class="form-group">
          <label>
            Gelar
          </label>
          <select class="form-control select2" style="width: 100%;" name="gelars_id">
            <option value="">...</option>
            @foreach ( \App\Gelar::all() as $gelar )
              <option @if( $anggotaKeluarga -> gelars_id == $gelar -> id ) selected="selected" @endif value="{{ $gelar -> id }}">{{ $gelar -> keterangan }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>
            NIK
          </label>
          <input type="text" class="form-control" placeholder="Masukkan NIK" name="nomor_ktp" value="{{ $anggotaKeluarga -> nomor_ktp }}">
        </div>

        <div class="form-group">
          <label>
            Jenis Kelamin
          </label>
          <select class="form-control select2" style="width: 100%;" name="jenis_kelamin">
            <option value="">...</option>
            <option @if( $anggotaKeluarga -> jenis_kelamin == "Laki-Laki" ) selected="selected" @endif value="Laki-Laki">Laki-Laki</option>
            <option @if( $anggotaKeluarga -> jenis_kelamin == "Perempuan" ) selected="selected" @endif value="Perempuan">Perempuan</option>
          </select>
        </div>

        <div class="form-group">
          <label>
            Tempat Lahir
          </label>
          <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" value="{{ $anggotaKeluarga -> tempat_lahir }}">
        </div>

        <div class="form-group">
          <label>
            Tanggal Lahir
          </label>
          <div class="input-group date" id="tanggalLahir" data-target-input="nearest">
            <div class="input-group-prepend" data-target="#tanggalLahir" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            <input type="text" class="form-control datetimepicker-input" data-target="#tanggalLahir" name="tanggal_bulan_tahun_lahir" value="{{ $anggotaKeluarga -> tanggal_bulan_tahun_lahir }}"/>
          </div>
        </div>

        <div class="form-group">
          <label>
            Akte Kelahiran
          </label>
          <select class="form-control select2" style="width: 100%;" name="surat_lahir">
            <option value="">...</option>
            <option @if( $anggotaKeluarga -> surat_lahir == "Ada" ) selected="selected" @endif value="Ada">Ada</option>
            <option @if( $anggotaKeluarga -> surat_lahir == "Tidak Ada" ) selected="selected" @endif value="Tidak Ada">Tidak Ada</option>
          </select>
        </div>

        <div class="form-group">
          <label>
            Nomor Akte Kelahiran
          </label>
          <input type="text" class="form-control" placeholder="Masukkan Nomor Akte Kelahiran, Apabila Ada" name="nomor_surat_lahir" value="{{ $anggotaKeluarga -> nomor_surat_lahir }}">
        </div>

        <div class="form-group">
          <label>
            Golongan Darah
          </label>
          <select class="form-control select2" style="width: 100%;" name="golongan_darahs_id">
            <option value="">...</option>
            @foreach ( \App\GolonganDarah::all() as $darah )
              <option @if( $anggotaKeluarga -> golongan_darahs_id == $darah -> id ) selected="selected" @endif value="{{ $darah -> id }}">{{ $darah -> keterangan }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>
            Agama
          </label>
          <select class="form-control select2" style="width: 100%;" name="agamas_id">
            <option value="">...</option>
            @foreach ( \App\Agama::all() as $agama )
              <option @if( $anggotaKeluarga -> agamas_id == $agama -> id ) selected="selected" @endif value="{{ $agama -> id }}">{{ $agama -> keterangan }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>
            Kepercayaan Kepada Tuhan Yang Maha Esa
          </label>
          <input type="text" class="form-control" placeholder="Masukkan Kepercayaan Kepada Tuhan Yang Maha Esa, Apabila Memilih Kepercayaan Kepada Tuhan Yang Maha Esa" name="kepercayaan_terhadap_tuhan_yang_maha_esa" value="{{ $anggotaKeluarga -> kepercayaan_terhadap_tuhan_yang_maha_esa }}">
        </div>

        <div class="form-group">
          <label>
            Status Perkawinan
          </label>
          <select class="form-control select2" style="width: 100%;" name="status_perkawinans_id">
            <option value="">...</option>
            @foreach ( \App\StatusPerkawinan::all() as $kawin )
              <option @if( $anggotaKeluarga -> status_perkawinans_id == $kawin -> id ) selected="selected" @endif value="{{ $kawin -> id }}">{{ $kawin -> keterangan }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>
            Akte Perkawinan
          </label>
          <select class="form-control select2" style="width: 100%;" name="buku_nikah">
            <option value="">...</option>
            <option @if( $anggotaKeluarga -> buku_nikah == "Ada" ) selected="selected" @endif value="Ada">Ada</option>
            <option @if( $anggotaKeluarga -> buku_nikah == "Tidak Ada" ) selected="selected" @endif value="Tidak Ada">Tidak Ada</option>
          </select>
        </div>

        <div class="form-group">
          <label>
            Nomor Akte Perkawinan
          </label>
          <input type="text" class="form-control" placeholder="Masukkan Nomor Akte Perkawinan, Apabila Ada" name="nomor_buku_nikah" value="{{ $anggotaKeluarga -> nomor_buku_nikah }}">
        </div>

        <div class="form-group">
          <label>
            Tanggal Perkawinan
          </label>
          <div class="input-group date" id="tanggalPerkawinan" data-target-input="nearest">
            <div class="input-group-prepend" data-target="#tanggalPerkawinan" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            <input type="text" class="form-control datetimepicker-input" data-target="#tanggalPerkawinan" name="tanggal_perkawinan" value="{{ $anggotaKeluarga -> tanggal_perkawinan }}"/>
          </div>
        </div>

        <div class="form-group">
          <label>
            Akte Perceraian
          </label>
          <select class="form-control select2" style="width: 100%;" name="surat_cerai">
            <option value="" selected="selected">...</option>
            <option @if( $anggotaKeluarga -> surat_cerai == "Ada" ) selected="selected" @endif value="Ada">Ada</option>
            <option @if( $anggotaKeluarga -> surat_cerai == "Tidak Ada" ) selected="selected" @endif value="Tidak Ada">Tidak Ada</option>
          </select>
        </div>

        <div class="form-group">
          <label>
            Nomor Akte Perceraian
          </label>
          <input type="text" class="form-control" placeholder="Masukkan Nomor Akte Perceraian, Apabila Ada" name="nomor_surat_cerai" value="{{ $anggotaKeluarga -> nomor_surat_cerai }}">
        </div>

        <div class="form-group">
          <label>
            Tanggal Perceraian
          </label>
          <div class="input-group date" id="tanggalPerceraian" data-target-input="nearest">
            <div class="input-group-prepend" data-target="#tanggalPerceraian" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            <input type="text" class="form-control datetimepicker-input" data-target="#tanggalPerceraian" name="tanggal_perceraian" value="{{ $anggotaKeluarga -> tanggal_perceraian }}"/>
          </div>
        </div>

        <div class="form-group">
          <label>
            Status Hubungan Dengan Kepala Keluarga
          </label>
          <select class="form-control select2" style="width: 100%;" name="status_hubungan_dengan_kepala_keluargas_id">
            <option value="">...</option>
            @foreach ( \App\StatusHubunganDenganKepalaKeluarga::all() as $keluarga )
              <option @if( $anggotaKeluarga -> status_hubungan_dengan_kepala_keluargas_id == $keluarga -> id ) selected="selected" @endif value="{{ $keluarga -> id }}">{{ $keluarga -> keterangan }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>
            Kelainan Fisik dan Mental
          </label>
          <select class="form-control select2" style="width: 100%;" name="kelainan_fisik">
            <option value="">...</option>
            <option @if( $anggotaKeluarga -> kelainan_fisik == "Ada" ) selected="selected" @endif value="Ada">Ada</option>
            <option @if( $anggotaKeluarga -> kelainan_fisik == "Tidak Ada" ) selected="selected" @endif value="Tidak Ada">Tidak Ada</option>
          </select>
        </div>

        <div class="form-group">
          <label>
            Penyandang Cacat
          </label>
          <select class="form-control select2" style="width: 100%;" name="penyandang_cacats_id">
            <option value="" selected="selected">...</option>
            @foreach ( \App\PenyandangCatat::all() as $cacat )
              <option @if( $anggotaKeluarga -> penyandang_cacats_id == $cacat -> id ) selected="selected" @endif value="{{ $cacat -> id }}">{{ $cacat -> keterangan }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>
            Pendidikan Terakhir
          </label>
          <select class="form-control select2" style="width: 100%;" name="pendidikan_terakhirs_id">
            <option value="" selected="selected">...</option>
            @foreach ( \App\PendidikanTerakhir::all() as $pendidikan )
              <option @if( $anggotaKeluarga -> pendidikan_terakhirs_id == $pendidikan -> id ) selected="selected" @endif value="{{ $pendidikan -> id }}">{{ $pendidikan -> keterangan }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>
            Pekerjaan
          </label>
          <select class="form-control select2" style="width: 100%;" name="pekerjaans_id">
            <option value="" selected="selected">...</option>
            @foreach ( \App\Pekerjaan::all() as $kerja )
              <option @if( $anggotaKeluarga -> pekerjaans_id == $kerja -> id ) selected="selected" @endif value="{{ $kerja -> id }}">{{ $kerja -> keterangan }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>
            NIK Ibu
          </label>
          <input type="text" class="form-control" placeholder="Masukkan NIK Ibu" name="nik_ibu" value="{{ $anggotaKeluarga -> nik_ibu }}">
        </div>

        <div class="form-group">
          <label>
            Nama Ibu
          </label>
          <input type="text" class="form-control" placeholder="Masukkan Nama Ibu" name="nama_ibu" value="{{ $anggotaKeluarga -> nama_ibu }}">
        </div>

        <div class="form-group">
          <label>
            NIK Ayah
          </label>
          <input type="text" class="form-control" placeholder="Masukkan NIK Ayah" name="nik_ayah" value="{{ $anggotaKeluarga -> nik_ayah }}">
        </div>

        <div class="form-group">
          <label>
            Nama Ayah
          </label>
          <input type="text" class="form-control" placeholder="Masukkan Nama Ayah" name="nama_ayah" value="{{ $anggotaKeluarga -> nama_ayah }}">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary float-right">
          Simpan
        </button>
      </div>
    </form>
  </div>
@endsection

@section('script')
  <script src="{{ asset('lte/plugins/select2/js/select2.full.min.js') }}"></script>

  <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

  <script>
    $(function () {
      $('.select2').select2();

      $('#tanggalLahir').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'
      });

      $('#tanggalPerkawinan').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'
      });

      $('#tanggalPerceraian').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'
      });
    });
  </script>
@endsection
