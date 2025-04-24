<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'СиСиКэт'],
            ['name' => 'RoyalCanin'],
            ['name' => 'WonderLab'],
            ['name' => 'БРИСИ'],
            ['name' => 'НеОдинДома'],
            ['name' => 'F78'],
            ['name' => 'Stefan'],
            ['name' => 'Flexi'],
            ['name' => 'HappyJungle'],
            ['name' => 'Пижон'],
            ['name' => 'Шустрик'],
            ['name' => 'Fiory'],
            ['name' => 'Tetra'],
            ['name' => 'AquaLighter'],
            ['name' => 'ZDK'],
            ['name' => 'RIO'],
            ['name' => 'Savic'],
            ['name' => 'Vitakraft'],
            ['name' => 'Triol'],
            ['name' => 'Elanco'],
            ['name' => 'KRKA'],
            ['name' => 'Favet'],
            ['name' => 'Астрафарм'],
            ['name' => 'ProPlan'],
        ];

        DB::table('brands')->insert($brands); 
    }
}
