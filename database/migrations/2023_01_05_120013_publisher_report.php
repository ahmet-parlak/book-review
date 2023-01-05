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
        Schema::create('publisher_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('publisher_id');
            $table->enum('publisher_name', ['reported', 'not reported'])->default('not reported');
            $table->enum('publisher_photo', ['reported', 'not reported'])->default('not reported');
            $table->enum('website', ['reported', 'not reported'])->default('not reported');
            $table->enum('description', ['reported', 'not reported'])->default('not reported');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publisher_reports');
    }
};
