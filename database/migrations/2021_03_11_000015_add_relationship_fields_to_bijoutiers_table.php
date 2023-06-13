<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBijoutiersTable extends Migration
{
    public function up()
    {
        Schema::table('bijoutiers', function (Blueprint $table) {
            $table->unsignedBigInteger('paye_id');
            $table->foreign('paye_id', 'paye_fk_3401407')->references('id')->on('payes');
        });
    }
}
