<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        for($i=1; $i<=10; $i++){
            $gender = "M";
            if($i%2 != 0){
                $gender="F";
            }
            
            DB::table('tbl_stu')
            ->insert([
                'name' => Str::random(10),
                'gender' => $gender,
                'score' => rand(50, 90)
            ]);
        }
    }
}
