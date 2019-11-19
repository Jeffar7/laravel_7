<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartmentsSeeder::class,
            PositionsTableSeeder::class,
            EmployeesSeeder::class,
            InventoriesTableSeeder::class,
            ArchiveTableSeeder::class,
            EmployeeInventoryTableSeeder::class
        ]);

    }
}
