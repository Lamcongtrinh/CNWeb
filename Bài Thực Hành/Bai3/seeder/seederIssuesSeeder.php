<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('issues')->insert([
            ['computer_id' => 1, 'reported_by' => 'Nguyen Van A', 'reported_date' => now(), 'description' => 'Máy tính chậm', 'urgency' => 'Medium', 'status' => 'Open'],
            // Thêm các bản ghi khác ở đây
        ]);
    }
}