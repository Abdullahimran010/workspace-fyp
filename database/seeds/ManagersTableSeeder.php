<?php

use Illuminate\Database\Seeder;

class ManagersTableSeeder extends Seeder
{
    public function run()
    {
        $password = \Illuminate\Support\Facades\Hash::make('password');
        $vendors = array(
            array(
                 
                'name' => 'Manager',
                'email' => 'manager@gmail.com',
                'password' => $password,
                'phone' => '03151234567',
                'experience' => 2,
                'fyp' => 2,
                'department_id' => 1, 
                
                
            ),
            array(
                 
                'name' => 'Asn',
                'email' => 'asn@gmail.com',
                'password' => $password,
                'phone' => '03151122334',
                'experience' => 1,
                'fyp' => 3,
                'department_id' => 1, 
                
            ),
                
            array(
                 
                'name' => 'Asnan',
                'email' => 'asnan@gmail.com',
                'password' => $password,
                'phone' => '03151122334',
                'experience' => 2,
                'fyp' => 3,
                'department_id' => 1, 
                
            ),
            array(
                 
                'name' => 'Abdullah',
                'email' => 'abdullah@gmail.com',
                'password' => $password,
                'phone' => '03133333123',
                'experience' => 2,
                'fyp' => 5,
                'department_id' => 1, 
                
            ),
            array(
                 
                'name' => 'Umer',
                'email' => 'umar@gmail.com',
                'password' => $password,
                'phone' => '03131333333',
                'experience' => 2,
                'fyp' => 1,
                'department_id' => 1, 
               
            ),
            array(
                 
                'name' => 'Abdul Rehman',
                'email' => 'abdulrehman@gmail.com',
                'password' => $password,
                'phone' => '031333333323',
                'experience' => 2,
                'fyp' => 0,
                'department_id' => 1, 
                
            ),
            array(
                 
                'name' => 'Imran',
                'email' => 'imran@gmail.com',
                'password' => $password,
                'phone' => '03133333344',
                'experience' => 2,
                'fyp' => 2,
                'department_id' => 1, 
                ),
            array(
                
                'name' => 'Kaleem',
                'email' => 'kaleem@gmail.com',
                'password' => $password,
                'phone' => '03133333348',
                'experience' => 2,
                'fyp' => 8,
                'department_id' => 1, 
            ),
            array(
                'name' => 'Anas',
                'email' => 'anas@gmail.com',
                'password' => $password,
                'phone' => '03133333349',
                'experience' => 2,
                'fyp' => 1,
                'department_id' => 1, 
                  ),
        );

        foreach ($vendors as $vendor)
        {
            \App\Models\Manager::create($vendor);
        }
    }
}
