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
        'email'=>'12345098@qq.com',
        'password'=>'admin666'
    ];
    /**
     * A basic feature test example.
     */
    public function test_Login()
    {
        $user=User::factory()->create();
        $response = $this->post('/api/login',[
                'email'=>$user->email,
                'password'=>'admin666'
            ]
        );

        $response->assertStatus(200);
    }

    public function test_LoginEmail()
    {
//        $user=User::factory()->create();
        $response = $this->post('/api/login',[
                'email'=>'asdf',
                'password'=>'admin666'
            ]
        );

        $response->assertSessionHasErrors('email');
    }

    public function test_LoginEmailRequired()
    {
        $response = $this->post('/api/login',[
                'password'=>'admin666'
            ]
        );

        $response->assertSessionHasErrors('email');
//        $response->assertStatus(200);

    }
}
