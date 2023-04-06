<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use RefreshDatabase;
    protected $data=[
        'account'=>'12345098@qq.com',
        'password'=>'admin666'
    ];
    /**
     * A basic feature test example.
     */
    public function test_Login()
    {
        $this->withoutExceptionHandling();
        $user=User::factory()->create();
        $response = $this->post('/api/login',[
                'account'=>$user->email,
                'password'=>'admin666'
            ]
        );

//        $response->assertStatus(200);
        $response->assertSee('token');

    }

    public function test_LoginAccount()
    {
//        $user=User::factory()->create();
        $response = $this->post('/api/login',[
                'account'=>'asdf',
                'password'=>'admin666'
            ]
        );

        $response->assertSessionHasErrors('account');
    }

    public function test_LoginAccountRequired()
    {
        $response = $this->post('/api/login',[
                'password'=>'admin666'
            ]
        );

        $response->assertSessionHasErrors('account');
//        $response->assertStatus(200);

    }

    public function test_LoginPasswordWrong()
    {
        $user=User::factory()->create();
        $response = $this->post('/api/login',[
                'account'=>$user->email,
                'password'=>'admin123'
            ]
        );

        $response->assertSessionHasErrors('password');

    }

    public function test_UserNotExist()
    {
        $response = $this->post('/api/login',[
                'account'=>'1@qq.com',
                'password'=>'admin666'
            ]
        );

        $response->assertSessionHasErrors('account');

    }

    public function test_mobileLogin()
    {
        $user = User::factory()->create(['mobile'=>'18088888888']);
        $response = $this->post('/api/login',[
                'account'=> $user->mobile,
                'password'=>'admin666'
            ]
        );

        $response->assertOk();

    }



}
