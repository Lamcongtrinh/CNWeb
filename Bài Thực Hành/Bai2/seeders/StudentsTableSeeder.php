<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;  // Đảm bảo bạn đã tạo Model Student nếu chưa.

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        Student::create([
            'first_name' => 'Nguyen',
            'last_name' => 'An',
            'date_of_birth' => '2005-06-15',
            'parent_phone' => '0987654321',
            'class_id' => 1  // Giả sử lớp có ID là 1
        ]);

        Student::create([
            'first_name' => 'Tran',
            'last_name' => 'Bich',
            'date_of_birth' => '2006-09-12',
            'parent_phone' => '0934567890',
            'class_id' => 2  // Giả sử lớp có ID là 2
        ]);

        // Thêm dữ liệu mẫu khác nếu cần...
    }
}
