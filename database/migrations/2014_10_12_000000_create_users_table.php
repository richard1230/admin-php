<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('unionid')->nullable()->comment('微信开放平台unionid');
            $table->string('openid')->nullable()->comment('微信openid');
            $table->string('miniapp_openid')->nullable()->comment('微信小程序openid');
            $table->string('name', 50)->nullable()->comment('昵称');
            $table->tinyInteger('sex')->default(1)->comment('性别');
            $table->string('email', 100)->nullable()->unique();
            $table->string('mobile', 20)->nullable()->unique();
            $table->string('real_name', 50)->nullable()->comment('真实姓名');
            $table->string('password')->nullable()->comment('密码');
            $table->string('home')->nullable()->comment('个人网站');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('weibo')->nullable()->comment('微博地址');
            $table->string('wechat')->nullable()->comment('微信号');
            $table->string('github')->nullable()->comment('GITHUB');
            $table->string('qq')->nullable()->comment('QQ');
            $table->string('wakatime')->nullable()->comment('wakatime');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱验证时间');
            $table->timestamp('mobile_verified_at')->nullable()->comment('手机验证时间');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedTinyInteger('lock')->nullable()->comment('用户锁定');
            $table->unsignedInteger('credit1')->nullable();
            $table->unsignedInteger('credit2')->nullable();
            $table->unsignedInteger('credit3')->nullable();
            $table->unsignedInteger('credit4')->nullable();
            $table->unsignedInteger('credit5')->nullable();
            $table->unsignedInteger('credit6')->nullable();
            $table->unsignedInteger('favour_count')->default(0)->comment('点赞数');
            $table->unsignedInteger('favorite_count')->default(0)->comment('收藏数');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

