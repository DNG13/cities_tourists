<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CitiesTouristsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            DB::table('city_tourist')->insert([
                'city_id' => rand(1, 10),
                'tourist_id' => rand(1, 10),
            ]);
        }
    }
}
