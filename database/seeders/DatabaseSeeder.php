<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        User::truncate();

        for ($i = 1; $i < 10; $i++) {

            $nim = "10522200{$i}";

            User::create([
                'username' => $nim,
                'name' => "User {$nim}",
                'email' => "{$nim}@student.universitaspertamina.ac.id",
                'password' => bcrypt('password'),
            ]);
        }

        $this->call([
            EventSeeder::class
        ]);
    }
}
