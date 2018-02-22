<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Відень',
            'Брюссель',
            'Софія',
            'Лондон',
            'Афіни',
            'Копенгаген',
            'Таллінн',
            'Дублін',
            'Мадрид',
            'Рим'
        ];
        $country = [
            'Австрія',
            'Бельгія',
            'Болгарія',
            'Велика Британія',
            'Греція',
            'Данія',
            'Естонія',
            'Ірландія',
            'Іспанія',
            'Італія'
        ];
        $links = [
            ["viden2.jpg","viden1.jpg","viden.jpg"],
            ["brusel1.jpg","brusel.jpg"],
            ["sofia.jpg"],
            ["london2.jpg","london1.jpg","london.jpg"],
            ["afiny.JPG"],
            ["copenhagen.jpg"],
            ["tallin.jpg"],
            ["dublin.jpg"],
            ["madrid.jpg"],
            ["rome.jpg"]
        ];
        for ($i=0; $i < 10; $i++) {
            \App\City::create([
                'name' => $name[$i],
                'country' => $country[$i],
                'links' =>$links[$i],
                'created_at' => '2018-01-08 12:37:0'.$i,
            ]);
        };
    }
}
