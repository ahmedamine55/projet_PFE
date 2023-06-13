<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddbBijouxTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('addb_bijoux_type', function (Blueprint $table) {
            $table->unsignedBigInteger('addb_bijoux_id');
            $table->foreign('addb_bijoux_id', 'addb_bijoux_id_fk_3401383')->references('id')->on('addb_bijouxes')->onDelete('cascade');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id', 'type_id_fk_3401383')->references('id')->on('types')->onDelete('cascade');
        });
    }
}
