<?php

use Illuminate\Database\Seeder;
use Faker\factory as Faker;

class KaryawanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();           //bikin data dummy/ palsu
        for ($i = 0; $i < 10; $i++) {
            $position = $i + 1;
            DB::table('karyawan')->insert([
                'nip' => '00'.$position,
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'jabatan' => $faker->title,

            ]);
        }
    }
}
