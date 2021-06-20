<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddbBijouxCategoriePivotTable extends Migration
{
    public function up()
    {
        Schema::create('addb_bijoux_categorie', function (Blueprint $table) {
            $table->unsignedBigInteger('addb_bijoux_id');
            $table->foreign('addb_bijoux_id', 'addb_bijoux_id_fk_3401384')->references('id')->on('addb_bijouxes')->onDelete('cascade');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id', 'categorie_id_fk_3401384')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
