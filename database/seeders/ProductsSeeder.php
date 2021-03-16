<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        [
            'name'=> 'Home theatre',
            'price'=> 2000,
            'category'=> 'speaker',
            'description'=> 'a sensible headset',
            'gallery' => 'n3.jpg'
        ],
        [
            'name'=> 'Headset',
            'price'=> 1500,
            'category'=> 'Headset',
            'description'=> 'a awesome headset',
            'gallery' => 'n3.png'
        ],
        [
            'name'=> 'Graphics Image',
            'price'=> 1300,
            'category'=> 'graphics',
            'description'=> 'a graphics design',
            'gallery' => 'graphics.jpeg'
        ]
        ]);
    }
}
