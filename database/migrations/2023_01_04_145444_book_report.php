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
        Schema::create('book_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->enum('isbn', ['reported', 'not reported'])->default('not reported');
            $table->enum('title', ['reported', 'not reported'])->default('not reported');
            $table->enum('original_title', ['reported', 'not reported'])->default('not reported');
            $table->enum('author', ['reported', 'not reported'])->default('not reported');
            $table->enum('translator', ['reported', 'not reported'])->default('not reported');
            $table->enum('publisher', ['reported', 'not reported'])->default('not reported');
            $table->enum('publication_year', ['reported', 'not reported'])->default('not reported');
            $table->enum('pages', ['reported', 'not reported'])->default('not reported');
            $table->enum('description', ['reported', 'not reported'])->default('not reported');
            $table->enum('book_photo', ['reported', 'not reported'])->default('not reported');
            $table->enum('language', ['reported', 'not reported'])->default('not reported');
            $table->enum('category', ['reported', 'not reported'])->default('not reported');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_reports');
    }
};
