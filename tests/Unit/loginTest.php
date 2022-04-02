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
    public function test_example()
    {
        $response = $this->call('POST','/login',[
            'email'=>'oladayoahmod1122@gmail.com',
            'password'=>'olami'
        ]);
        dd($response);
        $response->assertStatus($response->status(),200);
    }
}
