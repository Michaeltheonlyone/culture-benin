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
        Schema::table('contenus', function (Blueprint $table) {
            $table->unsignedBigInteger('id_utilisateur')->nullable()->after('parent_id');

            // Add foreign key constraint
            $table->foreign('id_utilisateur')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null'); // optional: set null if user deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contenus', function (Blueprint $table) {
            $table->dropForeign(['id_utilisateur']);
            $table->dropColumn('id_utilisateur');
        });
    }
};
