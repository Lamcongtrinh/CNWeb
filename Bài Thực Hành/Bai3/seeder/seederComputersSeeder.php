<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('computers')->insert([
            ['computer_name' => 'Lab1-PC05', 'model' => 'Dell Optiplex 7090', 'operating_system' => 'Windows 10 Pro', 'processor' => 'Intel Core i5-11400', 'memory' => 16, 'available' => 1],
            // Thêm các bản ghi khác ở đây
        ]);
    }
}