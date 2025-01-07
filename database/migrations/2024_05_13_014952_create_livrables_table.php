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
        Schema::create('livrables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('affectation_id');    // Foreign key column
            $table->unsignedBigInteger('apprenant_id'); // Foreign key column
            $table->string('piece_jointe');
            $table->enum('etat', ['Non rendu', 'Rendu', 'Rendu en retard', 'Approuvé', 'Rejeté'])->default('Non rendu');
            $table->float('note_produit', 8, 2)->nullable();
            $table->float('note_propos', 8, 2)->nullable();
            $table->float('note_processus', 8, 2)->nullable();
            $table->string('description')->nullable();
            $table->boolean('complete')->default(false);
            $table->string('evaluation_jointe')->nullable();
            $table->timestamps();
            $table->foreign('affectation_id')->references('id')->on('affectations')->onDelete('cascade');
            $table->foreign('apprenant_id')->references('id')->on('apprenants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livrables');
    }
};
