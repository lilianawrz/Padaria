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
        Schema::create('leituras', function (Blueprint $table) {
            $table->id();
            $table->integer('mac_id');
            $table->String('dataLeitura');
            $table->String('horaLeitura');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leituras');
    }
};
