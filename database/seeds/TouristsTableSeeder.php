<?php

use Illuminate\Database\Seeder;

class TouristsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_name = [
            'Олександр',
            'Артем',
            'Софія',
            'Данило',
            'Афіна',
            'Іван',
            'Лев',
            'Анастасія',
            'Вероніка',
            'Марія'
        ];
        $last_name = [
            'Мельник',
            'Шевченко',
            'Бойко',
            'Коваленко',
            'Бондаренко',
            'Ткаченко',
            'Швець',
            'Мороз',
            'Руденко',
            'Гаврилюк'
        ];
        for ($i=0; $i < 10; $i++) {
            \App\Tourist::create([
                'first_name' => $first_name[$i],
                'last_name' => $last_name[$i],
                'birthday' => rand(1900, 2017).'-'.rand(1, 12).'-'.rand(1, 29),
                'created_at' => '2018-01-08 12:37:0'.$i,
            ]);
        };
    }
}
