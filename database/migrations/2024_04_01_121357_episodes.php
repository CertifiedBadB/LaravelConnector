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
        Schema::create('episodes',function (Blueprint $table){
            $table->Id();
            $table->string('name');
            $table->unsignedBigInteger('season_id');
            $table->foreign('season_id')->references('Id')->on('seasons')->onDelete('cascade');
            $table->unsignedBigInteger('series_id');
            $table->foreign('series_id')->references('Id')->on('series')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
