<?php

namespace Database\Seeders;

use App\Models\Car_type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Car_types')->insert([
            [
                'type' => 'normal car',
                'speed' => '100 km/h',
            ],
            [
                'type' => 'luxury car',
                'speed' => '200 km/h',
            ],
            [
                'type' => 'sports car',
                'speed' => '300 km/h',
            ],]
        );
    }
}
