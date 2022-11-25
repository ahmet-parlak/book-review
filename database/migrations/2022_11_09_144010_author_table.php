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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('author_name');
            $table->string('country')->nullable();
            $table->string('birth_year')->nullable();
            $table->string('death_year')->nullable();
            $table->longText('description')->nullable();
            $table->string('author_photo', 2048)->nullable();
            $table->enum('title',['author', 'translator'])->default('author');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
};
