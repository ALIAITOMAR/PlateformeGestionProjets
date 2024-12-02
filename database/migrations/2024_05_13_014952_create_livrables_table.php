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
            $table->unsignedBigInteger('projet_id');    // Foreign key column
            $table->unsignedBigInteger('apprenant_id'); // Foreign key column
            $table->string('chemin_fichier');
            $table->enum('etat', ['rendu', 'Non rendu', 'rendu en retard']);
            $table->float('note_produit', 8, 2)->default(0);;
            $table->float('note_propos', 8, 2);
            $table->float('note_processus', 8, 2);
            $table->string('commentaires')->nullable();
            $table->timestamps();
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
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
