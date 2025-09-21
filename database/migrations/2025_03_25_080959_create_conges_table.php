<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->string('Type_conge');
            $table->date('Date_debut');
            $table->date('Date_fin');
            $table->integer('duree');
            $table->string('motif')->nullable()->change();;
            $table->enum('statut_conge', ['En attente', 'Accordé', 'Refusé']);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('conges');
    }
};
