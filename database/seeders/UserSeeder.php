<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) { // Ganti 10 dengan jumlah pengguna yang Anda inginkan
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password123'), // Ganti dengan kata sandi yang Anda inginkan
            ]);
        }
    }
}
