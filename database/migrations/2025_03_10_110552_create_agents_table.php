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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('matricule_Agent', 20)->unique();
            $table->string('nom_Agent');
            $table->string('prenom_Agent');
            $table->string('tel_Agent', 20);
            $table->date('date_naissance');
            $table->string('lieu_naissance', 20);
            $table->string('situation_matrimoniale');
            $table->string('grade_Agent', 200);
            $table->date('date_prise_service');
            $table->date('date_depart_retraite');
            $table->integer('num_affiliation_cnss');
            $table->enum('statut_Agent', ['Contractuel', 'Permanent']);
            $table->binary('photo_profil_Agent')->nullable();
            $table->string('mime_type')->nullable();
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
