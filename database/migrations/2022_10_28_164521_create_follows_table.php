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
        Schema::create('follows', function (Blueprint $table) {
            $table->foreignId('user_id')->refrences('id')->on('users')->onDelete('cascade');
            $table->foreignId('following_user_id')->refrences('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['user_id' ,'following_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
};
