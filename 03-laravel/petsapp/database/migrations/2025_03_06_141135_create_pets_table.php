<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->default('no-image.png')->nullable();
            $table->string('kind')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('age')->nullable();
            $table->string('breed')->nullable();
            $table->string('location')->nullable();
            $table->text(column: 'description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
