<?php

namespace Tests\Unit;

use Tests\TestCase;
class loginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login()
    {
        $response = $this->call('POST','/login',[
            'email'=>'oladayoahmod1122@gmail.com',
            'password'=>'olami'
        ]);
        // dd($response);
        $response->assertRedirect('/');
        // $response->assertStatus($response->status(),200);
    }

    public function test_admin_login(){
        $response = $this->call('POST','/admin',[
            'email' => 'oladayoahmod112@gmail.com',
            'password'=>'olami'
        ]);
        // dd($response);
        $response->assertRedirect('/dashboard');
    }
}
