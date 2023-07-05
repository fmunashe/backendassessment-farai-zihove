<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = [
            ['area_id'=>1,'shop_name'=>'Econet First Street'],
            ['area_id'=>2,'shop_name'=>'Econet Madokero'],
            ['area_id'=>3,'shop_name'=>'Econet Masasa'],

        ];

        foreach($shops as $shop){
            Shop::query()->create($shop);
        }
    }
}
