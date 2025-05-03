<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    User::create([
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'password' => bcrypt('password123')
    ]);
}
}
