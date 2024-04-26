<?php

namespace Database\Seeders;
use App\Models\Pet;
use App\Models\Manufacturer;
use App\Models\Shurui;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShuruisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
    {
        \DB::table('shuruis')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'str'=> '鉛筆',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'str'=> 'ボールペン',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'str'=> '消しゴム',
            ],
        ]);
    }
    }
