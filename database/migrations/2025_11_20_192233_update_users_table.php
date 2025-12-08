<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Drop Laravel default 'name' column
            if (Schema::hasColumn('users', 'name')) {
                $table->dropColumn('name');
            }

            // Add columns according to your Utilisateur model
            $table->string('nom')->after('id');
            $table->string('prenom')->after('nom');
            $table->enum('sexe', ['M','F'])->nullable()->after('password');
            $table->timestamp('date_inscription')->useCurrent()->after('sexe');
            $table->date('date_naissance')->nullable()->after('date_inscription');
            $table->string('statut')->default('actif')->after('date_naissance');
            $table->string('photo')->nullable()->after('statut');

            // Foreign keys
            $table->foreignId('id_role')->nullable()->constrained('roles')->after('photo');
            $table->foreignId('id_langue')->nullable()->constrained('langues', 'id_langue')->after('id_role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Drop foreign keys first
            $table->dropForeign(['id_role']);
            $table->dropForeign(['id_langue']);

            // Drop added columns
            $table->dropColumn([
                'nom', 'prenom', 'sexe', 
                'date_inscription', 'date_naissance', 
                'statut', 'photo', 'id_role', 'id_langue'
            ]);

            // Restore Laravel default 'name' column
            if (!Schema::hasColumn('users', 'name')) {
                $table->string('name')->after('id');
            }
        });
    }
};
