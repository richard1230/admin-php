<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory(10)->create();
        $user = User::first();
        $user->name = '中国牛叉';
        $user->email = '123456@qq.com';
        $user->save();

    }
}
