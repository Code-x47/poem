<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimony::create([
            "testifier"=>"Mr Ben",
            "testimony" => "Life was rough but God came through for me"
        ]);


         Testimony::create([
            "testifier"=>"Mrs Rose",
            "testimony" => "Life was rough but God came through for me"
        ]);
    }
}
