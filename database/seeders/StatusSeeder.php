<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'Формируется'],
            ['name' => 'В пути'],
            ['name' => 'Доставлен в пвз'],
            ['name' => 'Ждет выдачи'],
            ['name' => 'Получен'],
            ['name' => 'Отменен'],
        ];

        DB::table('statuses')->insert($statuses); 
    }
}
