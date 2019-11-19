<?php

use Illuminate\Database\Seeder;

class ArchiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'SURAT','description' => 'INI ADALAH SURAT','inventory_id'=>1],
            ['name'=>'SURAT LAPORAN','description' => 'INI ADALAH LAPORAN','inventory_id'=>2],
            ['name'=>'PROPOSAL','description' => 'INI ADALAH PROPOSAL','inventory_id'=>3]
        ];

        foreach ($data as $d){
            DB::table('archives')->insert([
                'name' => $d['name'],
                'description' => $d['description'],
                'inventory_id' => $d['inventory_id'],
            ]);
        }
    }
}
