<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     * @test
     */
    public function test_userRegister()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/api/register',[
            'email'=>'12345098@qq.com',
            'password'=>'admin'
        ]);

        $response->assertStatus(201);
//        $response->assertSee(222);

    }


}
