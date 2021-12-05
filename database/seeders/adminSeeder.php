<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'name' => 'Oladayo Akorede',
            'email' => 'oladayoahmod112@gmail.com',
            'password' => Hash::make('olami')
        ]);
    }
}
