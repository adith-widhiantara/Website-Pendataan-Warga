<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class KartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      for ($i=0; $i < 3; $i++) {
        \App\KartuKeluarga::create([
          'nomorkk' => $faker -> numberBetween($min = 1000000000000000, $max = 9999999999999999),
          'alamat' => $faker -> address,
          'kode_pos' => $faker -> postcode,
          'rt' => $faker -> numberBetween($min = 1, $max = 10),
          'rw' => $faker -> numberBetween($min = 1, $max = 10),
          'telepon_rumah' => $faker -> e164PhoneNumber,
        ]);
      }
    }
}
