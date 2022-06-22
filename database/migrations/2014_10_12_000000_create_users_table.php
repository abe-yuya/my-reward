<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('ユーザーID');
            $table->string('name')->comment('ユーザー名');
            $table->string('email')->comment('メールアドレス')->unique();
            $table->timestamp('email_verified_at')->nullable()->comment('メール受信日時');
            $table->string('password')->comment('パスワード');
            $table->string('profile_image_name')->nullable()->comment('プロフィール画像名');
            $table->string('work_place')->nullable()->comment('会社');
            $table->string('occupation')->nullable()->comment('職業');
            $table->unsignedBigInteger('reward_count')->default(0)->comment('reward数');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
