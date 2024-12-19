<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id'); // Mã giao dịch bán hàng
            $table->foreignId('medicine_id')->constrained('medicines'); // Khóa ngoại
            $table->integer('quantity'); // Số lượng bán ra
            $table->date('sale_date'); // Ngày bán hàng
            $table->string('customer_phone', 10); // Số điện thoại khách hàng
            $table->timestamps(); // Tạo trường created_at và updated_at
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
