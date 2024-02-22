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
    Schema::create('exchange_requests', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('sender_user_id');
        $table->unsignedBigInteger('receiver_user_id');
        $table->unsignedBigInteger('skill_id');
        $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
        $table->text('message')->nullable();
        $table->timestamps();

        $table->foreign('sender_user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('receiver_user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_requests');
    }
};
