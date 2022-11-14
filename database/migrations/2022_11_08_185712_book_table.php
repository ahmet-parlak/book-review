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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->string('title');
            $table->string('original_title')->nullable();
            $table->string('translator')->nullable();
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->string('publication_year')->nullable();
            $table->string('pages')->nullable();
            $table->longText('description')->nullable();
            $table->string('book_photo', 2048)->nullable();
            $table->enum('status',['draft','active','passive'])->default('draft');
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
        Schema::dropIfExists('books');
    }
};
