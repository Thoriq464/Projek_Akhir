<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Chimo Rin', 
                'email' => 'Chimorin@gmail.com', 
                'password' => 'Admin1234#'
            ],
        ];

        foreach ($data as $item) {
            User::create($item);
        }
    }
}
