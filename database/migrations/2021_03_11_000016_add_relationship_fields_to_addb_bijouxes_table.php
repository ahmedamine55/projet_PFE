<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddbBijouxesTable extends Migration
{
    public function up()
    {
        Schema::table('addb_bijouxes', function (Blueprint $table) {
            $table->unsignedBigInteger('bijoutier_id');
            $table->foreign('bijoutier_id', 'bijoutier_fk_3401385')->references('id')->on('bijoutiers');
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id', 'currency_fk_3401431')->references('id')->on('currencies');
        });
    }
}
