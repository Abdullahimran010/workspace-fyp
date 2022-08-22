<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        $password = Hash::make('password');
        $admins = array(
            array(
                'name' => 'ETAS',
                'email' => 'admin@gmail.com',
                'password' => $password,
                'isAdmin' => 1,
                'status' => 1,
                'privilege' => "admin"
            ),
        );
        foreach ($admins as $admin)
        {
            \App\Models\Admin::create($admin);
        }
    }
}
