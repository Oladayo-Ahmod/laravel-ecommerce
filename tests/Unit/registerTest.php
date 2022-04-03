<?php

namespace Tests\Unit;

use App\Models\User;
use Hash;
use Tests\TestCase;


class registerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_register()
    {
        // using model
        // $user = new User;
        // $user = $user->create([
        //     'first_name'=>'test first name',
        //     'last_name'=>'test last name',
        //     'address'=>'test address',
        //     'email'=>'olalekan112@gmail.com',
        //     'phone'=>'12345678909',
        //     'password'=>'olami'
        // ]);
        // // dd($user);
        // $user->assertStatus($user->status(),200);
        // $this->assertStatus(true);

        // using http requests
        $response = $this->call('POST','/register',[
            'first_name'=>'test first name',
            'last_name'=>'test last name',
            'address'=>'test address',
            'email'=>'olalekan1133@gmail.com',
            'phone'=>'12345678909',
            'password'=>'olami'
        ]);
        // dd($response);
            $response->assertStatus($response->status(),200);
    }
}
