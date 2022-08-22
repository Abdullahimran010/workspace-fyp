<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        // $this->call(EmployeesTableSeeder::class);
        $this->call(ManagersTableSeeder::class);
    }
}
