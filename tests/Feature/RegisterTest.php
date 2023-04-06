<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    protected $data=[
            'account'=>'12345098@qq.com',
            'password'=>'admin666',
        'password_confirmation'=>'admin666'
    ];
    /**
     * A basic feature test example.
     * @test
     */
    public function test_userRegister()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/api/register',$this->data);

//        $response->assertStatus(201);
        $response->assertStatus(200);


    }

    public function test_RegisterAccountValidate()
    {
//        $this->withoutExceptionHandling();
        $response = $this->post('/api/register',['account'=>'aaa']+$this->data);
        $response->assertSessionHasErrors('account');

    }


    public function test_AccountRequiredValidate(){
        $data = $this->data;
        unset($data['account']);
        $response = $this->post('/api/register',$data);
        $response->assertSessionHasErrors('account');
    }

    public function test_UniqueAcountValidate()
    {
//        $this->withoutExceptionHandling();
        $response = $this->post('/api/register',$this->data);
        $response1 = $this->post('/api/register',$this->data);
        $response1->assertSessionHasErrors('account');
//        $response1->assertStatus(201);
    }

     public function test_PasswordIsError(){
         $response = $this->post('/api/register',['password'=>'111111']+$this->data);
         $response->assertSessionHasErrors('password');
     }



}
