<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();  // Mã lớp
            $table->enum('grade_level', ['Pre-K', 'Kindergarten']);  // Cấp độ lớp
            $table->string('room_number', 10);  // Phòng học
            $table->timestamps();  // Tạo các cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
