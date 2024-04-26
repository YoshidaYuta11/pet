<?php

namespace Database\Seeders;
use App\Models\Manufacturer;
use App\Models\Pet;
use App\Models\Shurui;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KyakusakisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('kyakusakis')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name'=> 'Ａ株式会社',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name'=> 'Ｂ株式会社',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name'=> 'Ｃ株式会社',
            ],
        ]);
    }
}
