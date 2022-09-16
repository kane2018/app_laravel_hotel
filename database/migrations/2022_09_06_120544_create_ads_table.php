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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->string('title', 255)->nullable(false);
            $table->string('slug', 255)->nullable(false);
            $table->float('price')->nullable(false);
            $table->text('introduction')->nullable(false);
            $table->text('content')->nullable(false);
            $table->string('cover_image', 255)->nullable(false);
            $table->integer('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
};
