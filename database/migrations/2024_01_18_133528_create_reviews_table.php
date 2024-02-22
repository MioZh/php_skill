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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exchange_request_id');
            $table->unsignedBigInteger('reviewer_user_id');
            $table->unsignedBigInteger('reviewee_user_id');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->timestamps();
    
            $table->foreign('exchange_request_id')->references('id')->on('exchange_requests')->onDelete('cascade');
            $table->foreign('reviewer_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reviewee_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
