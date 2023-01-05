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
        Schema::create('author_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('author_id');
            $table->enum('author_name', ['reported', 'not reported'])->default('not reported');
            $table->enum('author_photo', ['reported', 'not reported'])->default('not reported');
            $table->enum('country', ['reported', 'not reported'])->default('not reported');
            $table->enum('birth_year', ['reported', 'not reported'])->default('not reported');
            $table->enum('death_year', ['reported', 'not reported'])->default('not reported');
            $table->enum('description', ['reported', 'not reported'])->default('not reported');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_reports');
    }
};
