<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddbBijouxesTable extends Migration
{
    public function up()
    {
        Schema::create('addb_bijouxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string("photo1")->nullable();
            $table->string("photo2")->nullable();
            $table->string("photo3")->nullable();
            $table->longText('description')->nullable();
            $table->string("prix")->nullable();
            $table->string("quantity")->nullable();
            $table->string('verified')->default('new');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
