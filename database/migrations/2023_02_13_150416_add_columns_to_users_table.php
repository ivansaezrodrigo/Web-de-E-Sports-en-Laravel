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
    // Añade las columnas necesarias a la tabla de usuarios
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->unique();
            $table->date('birthday');
            $table->enum('rol', ['member', 'admin'])->default('member');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('twitch');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // Elimina las columnas añadidas a la tabla de usuarios
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropcolumn('birthday');
            $table->dropcolumn('rol');
            $table->dropcolumn('twitter');
            $table->dropcolumn('instagram');
            $table->dropcolumn('twitch');
        });
    }
};
