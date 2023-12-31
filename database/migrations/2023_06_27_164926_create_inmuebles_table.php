<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('propietario');
            $table->integer('precio');
            $table->enum('ubicacion', ['Este', 'Oeste', 'Norte', 'Sur', 'Centro']);
            $table->unsignedBigInteger('asesor_id');
            $table->foreign('asesor_id')->references('id')->on('asesors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmuebles');
    }
};
