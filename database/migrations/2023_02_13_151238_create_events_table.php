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
    // Crea la tabla de eventos
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name',15);
            $table->text('description');
            $table->text('location');
            $table->date('fecha');
            $table->time('hour');
            $table->text('tags');
            $table->boolean('visible')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // Elimina la tabla de eventos
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
