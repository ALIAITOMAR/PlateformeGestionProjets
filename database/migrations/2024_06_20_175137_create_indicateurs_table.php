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
        Schema::create('indicateurs', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('projet_id'); // Foreign key column
            $table->unsignedBigInteger('critere_id'); // Foreign key column
            $table->string('libelle');
            $table->float('bareme');
            $table->timestamps();
            //$table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
            $table->foreign('critere_id')->references('id')->on('criteres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicateurs');
    }
};
