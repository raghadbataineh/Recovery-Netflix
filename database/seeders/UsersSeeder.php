<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'raghad@gmail.com',
            'password' => bcrypt('password'), // use bcrypt to hash the password
            'role' => 'admin',
        ]);

         User::create([
            'name' => 'Employee User',
            'email' => 'Khaled@gmail.com',
            'password' => bcrypt('password'), // use bcrypt to hash the password
            'role' => 'employee',
        ]);

         User::create([
            'name' => 'Normal User',
            'email' => 'Moatasem@gmail.com',
            'password' => bcrypt('password'), // use bcrypt to hash the password
            'role' => 'user',
        ]);

    }
}
