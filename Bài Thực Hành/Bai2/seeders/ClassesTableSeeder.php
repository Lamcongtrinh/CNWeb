<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassModel;  // Đảm bảo bạn đã tạo Model ClassModel nếu chưa.

class ClassesTableSeeder extends Seeder
{
    public function run()
    {
        ClassModel::create([
            'grade_level' => 'Pre-K',
            'room_number' => 'VH7'
        ]);

        ClassModel::create([
            'grade_level' => 'Kindergarten',
            'room_number' => 'VH8'
        ]);

        // Thêm các lớp khác nếu cần...
    }
}
