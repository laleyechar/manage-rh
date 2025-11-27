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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('prenom'); // Supprimer la colonne prenom
            $table->renameColumn('nom', 'nom_complet');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('prenom'); // recrée prenom si rollback
            $table->renameColumn('nom_complet', 'nom'); 
        });
    }
};
