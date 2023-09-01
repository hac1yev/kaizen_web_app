<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('username')->nullable();
            $table->string('slug');
            $table->text('about')->default('Haqqımda');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->string('email_verification_code')->nullable();
            $table->string('password');
            $table->boolean('verified')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->boolean('subscribed')->default(true);
            $table->rememberToken()->nullable();
            $table->boolean('deleted')->default(false);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));         
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
};
