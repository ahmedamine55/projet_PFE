<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBijoutiersTable extends Migration
{
    public function up()
    {
        Schema::create('bijoutiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('mobile')->unique();
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->longText('description')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('web')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('type_payement')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
