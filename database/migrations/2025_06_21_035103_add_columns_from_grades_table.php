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
        Schema::table('grades', function (Blueprint $table) {
            $table->string('categorie_ancien');
            $table->string('categorie_nouveau');

            $table->string('classe_ancien');
            $table->string('classe_nouveau');

            $table->string('echelon_ancien');
            $table->string('echelon_nouveau');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->dropColumn('categorie_ancien');
            $table->dropColumn('categorie_nouveau');
            $table->dropColumn('classe_ancien');
            $table->dropColumn('classe_nouveau');
            $table->dropColumn('echelon_ancien');
            $table->dropColumn('echelon_nouveau');
        });
    }
};
