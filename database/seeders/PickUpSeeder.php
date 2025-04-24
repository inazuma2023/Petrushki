<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PickUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            "Москва",
            "Санкт-Петербург",
            "Новосибирск",
            "Екатеринбург",
            "Казань",
            "Нижний Новгород",
            "Челябинск",
            "Самара",
            "Омск",
            "Ростов-на-Дону",
            "Уфа",
            "Красноярск",
            "Воронеж",
            "Пермь",
            "Волгоград",
            "Краснодар",
            "Саратов",
            "Тюмень",
            "Тольятти",
            "Ижевск",
        ];
        
        $pickup_points = [];
        
        foreach ($cities as $city) {
            $num_points = rand(3, 5);
        
            for ($i = 1; $i <= $num_points; $i++) {
                $street_names = [
                    "Центральная",
                    "Ленина",
                    "Гагарина",
                    "Мира",
                    "Советская",
                    "Заводская",
                    "Набережная",
                    "Промышленная",
                    "Лесная",
                    "Южная",
                    "Новая",
                ];
        
                $street = $street_names[array_rand($street_names)];
                $house_number = rand(1, 200);        
                $address = "{$city}, ул. {$street}, д. {$house_number}";
        
        
                $pickup_points[] = [
                    "city" => $city,
                    "address" => $address
                ];
            }
        }
        
        DB::table('pick_ups')->insert($pickup_points); 
    }
}
