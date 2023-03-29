<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    protected $data=[
            'email'=>'12345098@qq.com',
            'password'=>'admin666'
        ];
    /**
     * A basic feature test example.
     * @test
     */
    public function test_userRegister()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/api/register',$this->data);

        $response->assertStatus(201);

    }

    public function test_RegisterEmailValidate()
    {
//        $this->withoutExceptionHandling();
        $response = $this->post('/api/register',['email'=>'aaa']+$this->data);
        $response->assertSessionHasErrors('email');

    }

    public function test_UniqueEmailValidate()
    {
//        $this->withoutExceptionHandling();
        $response = $this->post('/api/register',$this->data);
        $response1 = $this->post('/api/register',$this->data);
        $response1->assertSessionHasErrors('email');
//        $response1->assertStatus(201);
    }

    public function test_PasswordValidate()
    {
//        $this->withoutExceptionHandling();
        $response = $this->post('/api/register',[
            'email'=>'12345098@qq.com',
            'password'=>'666'
        ]);
        $response->assertSessionHasErrors('password');
    }



}
