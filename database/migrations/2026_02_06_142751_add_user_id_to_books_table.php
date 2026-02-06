<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1) Ajouter user_id en nullable pour que SQLite accepte
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id');
        });

        // 2) Remplir les anciennes lignes (on met 1 par défaut)
        // IMPORTANT: ça suppose que l'utilisateur id=1 existe.
        DB::table('books')->whereNull('user_id')->update(['user_id' => 1]);

        // 3) Ajouter la contrainte de clé étrangère
        Schema::table('books', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });

        // 4) Repasser en NOT NULL (SQLite a besoin du "rebuild")
        // Laravel gère ça via "change" seulement si doctrine/dbal est installé.
        // Donc on ne force pas le NOT NULL ici pour éviter un autre crash.
        // On peut le faire plus tard en recréant la table, ou en migrate:fresh en dev.
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
