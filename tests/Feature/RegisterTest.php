<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_userRegister()
    {
        $response = $this->post('/api/register',[
            'email'=>'1234567@qq.com',
            'password'=>'admin'
        ]);

        $response->assertStatus(200);
//        $response->assertSee(11);
    }
}