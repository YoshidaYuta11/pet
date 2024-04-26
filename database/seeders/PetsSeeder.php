<?php

namespace Database\Seeders;
use App\Models\Pet;
use App\Models\Manufacturer;
use App\Models\Shurui;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('pets')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
		'name'=> '3B鉛筆',
		'kakaku'=> '100',
		'shurui'=> '1',
        'manufacturer'=> '1',
		'shosai'=> '小学生の間で非常に好評です。とくに低学年にお薦めです。',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
		'name'=> '2B鉛筆',
		'kakaku'=> '101',
		'shurui'=> '1',
        'manufacturer'=> '1',
		'shosai'=> '小学生の間で非常に好評です。とくに高学年にお薦めです。',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
		'name'=> 'B鉛筆',
		'kakaku'=> '102',
		'shurui'=> '1',
        'manufacturer'=> '1',
		'shosai'=> '小学生の間で非常に好評です。保護者でも愛用者が多いです。',
            ],
        ]);
        Pet::factory()->count(10)->create();
    }
}
