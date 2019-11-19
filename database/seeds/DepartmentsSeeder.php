<?php

use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Finance', 'code' => 'F'],
            ['name'=>'IT Enginering', 'code' => 'IT'],
            ['name'=>'Administration', 'code' => 'ADMIN'],
            ['name'=>'Operation', 'code' => 'OP'],
        ];
        foreach($data as $d){
            DB::table('departments')->insert([
                'name' => $d['name'],
                'code' => $d['code'],
            ]);
        }
    }
}
