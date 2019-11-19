<?php

use Illuminate\Database\Seeder;

class InventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Mobil Dinas Lapangan','description'=>'Mobil toyota Fortuner Biru'],
            ['name'=>'MObil Dinas Harian 1','description'=>'Mobil toyota Jazz Merah'],
            ['name'=>'MObil Dinas Harian 1','description'=>'Mobil toyota Jazz Kuning'],
        ];
        foreach($data as $d){
            DB::table('inventories')->insert([
                'name' => $d['name'],
                'description' => $d['description'],
            ]);
        }
    }
}
