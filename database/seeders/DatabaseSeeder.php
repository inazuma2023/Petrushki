<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Федор',
                'email' => 'ex1@gmail.com',
                'password' => bcrypt('qazwsx123'),
                'phone' => 89999999991,
                'fullname' => 'Федор Романов',
                'created_at' => now()
            ],
            [
                'name' => 'Петр',
                'email' => 'ex2@gmail.com',
                'password' => bcrypt('qazwsx123'),
                'phone' => 89999999992,
                'fullname' => 'Петор Лавров',
                'created_at' => now()
            ],
            [
                'name' => 'Мария',
                'email' => 'ex3@gmail.com',
                'password' => bcrypt('qazwsx123'),
                'phone' => 89999999993,
                'fullname' => 'Мария Савина',
                'created_at' => now()
            ],
            [
                'name' => 'Администратор',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin12345'),
                'phone' => 89999999994,
                'fullname' => 'Administrator',
                'created_at' => now()
            ],
        ]);

        $this->call([CategorySeeder::class]);
        $this->call([BrandSeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([ReviewSeeder::class]);
        $this->call([StatusSeeder::class]);
        $this->call([PickUpSeeder::class]);
    }
}
