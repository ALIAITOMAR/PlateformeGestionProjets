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
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->date('date_affectation');
            $table->date('date_fin');
            $table->unsignedBigInteger('enseignant_id'); // Foreign key column
            $table->unsignedBigInteger('groupe_id');     // Foreign key column
            $table->unsignedBigInteger('projet_id');     // Foreign key column
            $table->timestamps();
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade');
            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};
