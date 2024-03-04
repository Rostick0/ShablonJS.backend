<?php

namespace Database\Seeders;

use App\Models\Rubric;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RubricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');

        $data = [
            [
                'name' => 'Компьютеры',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Смартфоны',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Бытовая техника',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Разное',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Rubric::insert($data);
    }
}
