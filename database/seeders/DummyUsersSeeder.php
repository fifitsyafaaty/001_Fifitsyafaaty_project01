<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData =[
            [
                'name' => 'fifit syafaaty',
                'email' => 'fifitsyfaaty@gmail.com',
                'role' => 'mahasiswa',
                'password' => bcrypt('12345678')
            ],[
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('admin')
            ],[
                'name' => 'asmunin',
                'email' => 'asmunin@gmail.com',
                'role' => 'dosen',
                'password' => bcrypt('asmunin')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
