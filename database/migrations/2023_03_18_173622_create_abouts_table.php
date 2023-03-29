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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('nav_logo')->nullable();
            $table->string('main_logo')->nullable();
            $table->string('main_title')->nullable();
            $table->string('about_image')->nullable();
            $table->string('name')->nullable();
            $table->text('about_description')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->integer('number')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkdin')->nullable();
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
        Schema::dropIfExists('abouts');
    }
};
