<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        $password = \Illuminate\Support\Facades\Hash::make('password');
        $employees = array(
            array(
                'emp_id' => '12AS34DF',
                'name' => 'Shiza',
                'email' => 'shiza@gmail.com',
                'password' => $password,
                'avatar' => 'customers/defaultavatar.png',
                'rank' => 'Manager'
            ),
            array(
                'emp_id' => '12AS34GH',
                'name' => 'Imran',
                'email' => 'imran@gmail.com',
                'password' => $password,
                'avatar' => 'customers/defaultavatar.png',
                'rank' => 'HR Manager'
            ),
        );
        foreach ($employees as $employee)
        {
            \App\Models\Employee::create($employee);
        }
    }
}
