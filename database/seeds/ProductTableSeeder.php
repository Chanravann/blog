<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=100; $i++){
            DB::table('products')
                ->insert([
                    'name' => Str::random(10),
                    'barcode' => Str::random(8),
                    'quantity' =>rand(1,50),
                    'price' => rand(5, 50),
                    'category_id' => rand(1, 5),
                    'description' => Str::random(120),
                    'code' => Str::random(5)
                ]);
        }
    }
}
