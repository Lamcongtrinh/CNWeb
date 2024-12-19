<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();  // Mã học sinh
            $table->string('first_name');  // Tên học sinh
            $table->string('last_name');  // Họ đệm
            $table->date('date_of_birth');  // Ngày sinh
            $table->string('parent_phone', 20);  // Số điện thoại phụ huynh
            $table->unsignedBigInteger('class_id');  // Khóa ngoại liên kết với bảng classes
            $table->timestamps();  // Tạo các cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
