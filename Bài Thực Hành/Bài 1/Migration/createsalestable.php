<?php 
class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id');
            $table->unsignedBigInteger('medicine_id');
            $table->integer('quantity');
            $table->date('sale_date');
            $table->string('customer_phone', 10)->nullable();

            $table->foreign('medicine_id')->references('medicine_id')->on('medicines');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;