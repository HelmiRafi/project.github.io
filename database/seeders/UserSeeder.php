<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $userData = [
                [
                'name'     => 'admin',
                'email'    =>'admin@gmail.com',
                'password' => bcrypt('123456'),
                'role'     =>'admin',
                ],  
                [
                    'name'     => 'user',
                    'email'    =>'user@gmail.com',
                    'password' => bcrypt('123456'),
                    'role'     =>'user',
                ],
                [
                    'name'     => 'helmi',
                    'email'    =>'helmi@gmail.com',
                    'password' => bcrypt('123456'),
                    'role'     =>'admin',
                ],
            ];
            foreach ($userData as $key => $val) {
                User::create($val);
            }
    }
}
