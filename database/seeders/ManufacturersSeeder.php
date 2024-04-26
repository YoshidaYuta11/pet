<?php

namespace Database\Seeders;
use App\Models\Manufacturer;
use App\Models\Pet;
use App\Models\Shurui;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManufacturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \DB::table('manufacturers')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'str' => 'コカ・コーラ',
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'str' => 'サントリー',
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'str' => 'キリン',
            ],
        ]);

        // メーカー名をもとにリレーションを介して pets テーブルの各行を更新
        $manufacturers = Manufacturer::pluck('str', 'id'); // メーカー名をすべて取得

Pet::chunk(100, function ($pets) use ($manufacturers) {
    foreach ($pets as $pet) {
        // メーカーIDをもとにメーカー名を取得し、pets テーブルの manufacturer 列を更新
        $pet->manufacturer = $manufacturers[$pet->manufacturer] ?? null;
        $pet->save();
    }
});
    }
    }
