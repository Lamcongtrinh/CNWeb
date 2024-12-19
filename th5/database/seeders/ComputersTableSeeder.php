<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Computer;
class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $f = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            Computer::create([
                'computer_name' => $f->regexify('Lab[1-9]-PC[0-9]{2}'), // Tên máy tính
                'model' => $f->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre M720']),
                'operating_system' => $f->randomElement(['Windows 10 Pro', 'Ubuntu 22.04', 'macOS Big Sur']),
                'processor' => $f->randomElement(['Intel Core i5-11400', 'Intel Core i7-11700', 'AMD Ryzen 5 5600G']),
                'memory' => $f->randomElement([8, 16, 32]), // Bộ nhớ RAM (GB)
                'available' => $f->boolean, // Trạng thái hoạt động
            ]);
        }
    }
}