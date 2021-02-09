<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class KelahiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      for ($i=0; $i < 2; $i++) {
        $anggotaKeluarga = \App\AnggotaKeluarga::create([
          'kartu_keluarga_id' => 3,
          'nama' => $faker->name,
          'gelars_id' => 4,
          'nomor_ktp' => $faker->numberBetween($min = 1000000000000000, $max = 9999999999999999),
          'jenis_kelamin' => $faker->randomElement(['Laki-Laki' ,'Perempuan']),
          'tempat_lahir' => $faker->city,
          'tanggal_bulan_tahun_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
          'surat_lahir' => "Tidak Ada",
          'golongan_darahs_id' => $faker->numberBetween($min = 1, $max = 13),
          'agamas_id' => $faker->numberBetween($min = 1, $max = 6),
          'status_perkawinans_id' => 1,
          'buku_nikah' => "Tidak Ada",
          'surat_cerai' => "Tidak Ada",
          'status_hubungan_dengan_kepala_keluargas_id' => 4,
          'kelainan_fisik' => "Tidak Ada",
          'penyandang_cacats_id' => 7,
          'pendidikan_terakhirs_id' => 1,
          'pekerjaans_id' => 1,
          'nik_ibu' => $faker->numberBetween($min = 1000000000000000, $max = 9999999999999999),
          'nama_ibu' => $faker->name,
          'nik_ayah' => $faker->numberBetween($min = 1000000000000000, $max = 9999999999999999),
          'nama_ayah' => $faker->name,
          'users_id' => 12,
        ]);

        \App\DataKelahiran::create([
          'tanggal_melapor' => \Carbon\Carbon::now(),
          'nama_pelapor_id' => 11,
          'anggota_keluarga_id' => $anggotaKeluarga -> id,
          'nomor_anak' => $faker -> numberBetween($min = 2, $max = 4),
          'keterangan' => $faker -> word,
        ]);
      }
    }
}
