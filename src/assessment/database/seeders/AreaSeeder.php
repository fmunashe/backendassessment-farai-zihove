<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            ['id'=>'1','area_name' => 'Harare CBD'],
            ['id'=>'2','area_name' => 'Harare West'],
            ['id'=>'3','area_name' => 'Harare East'],
        ];

        foreach ($areas as $area) {
            Area::query()->create($area);
        }
    }
}
