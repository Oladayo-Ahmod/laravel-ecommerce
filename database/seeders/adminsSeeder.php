<?php

namespace Database\Seeders;
use Hash;
use Illuminate\Database\Seeder;
use DB;
class adminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Oladayo Akorede',
            'email' => 'oladayoahmod112@gmail.com',
            'password' => Hash::make('olami')
        ]);
    }
}
