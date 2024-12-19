<?php 
class SalesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sales')->insert([
            [
                'medicine_id' => 1, // Paracetamol
                'quantity' => 2,
                'sale_date' => '2024-12-12',
                'customer_phone' => '0912345678',
            ],
            [
                'medicine_id' => 2, // Ibuprofen
                'quantity' => 1,
                'sale_date' => '2024-12-11',
                'customer_phone' => '0987654321',
            ],
        ]);
    }
}
