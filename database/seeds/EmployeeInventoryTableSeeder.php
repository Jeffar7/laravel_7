<?php

use Illuminate\Database\Seeder;
use Faker\factory as Faker;
class EmployeeInventoryTableSeeder extends Seeder
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
            DB::table('employee_inventory')->insert([
                'employee_id' =>$faker->numberBetween($min = 1, $max = 7),
                'inventory_id' => $faker->numberBetween($min = 1, $max = 3)
            ]);
        }
    }
}
