<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class AnggotaUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      for ($i=5; $i < 8; $i++) {
        \App\AnggotaKeluarga::where('id', $i)
                            ->update([
                              'nomor_ktp' => $faker->numberBetween($min = 1000000000000000, $max = 9999999999999999),
                              'nik_ibu' => $faker->numberBetween($min = 1000000000000000, $max = 9999999999999999),
                              'nik_ayah' => $faker->numberBetween($min = 1000000000000000, $max = 9999999999999999),
                            ]);
      }
    }
}
