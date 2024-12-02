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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enseignant_id'); // Foreign key column
            $table->string('titre');
            $table->text('description');
            $table->string('module');
            $table->json('competence');
            $table->enum('etat', ['Non Affecté', 'Affecté', 'Clôturé'])->default('Non Affecté');
            $table->timestamps();
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
