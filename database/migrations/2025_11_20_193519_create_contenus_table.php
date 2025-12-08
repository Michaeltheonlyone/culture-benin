<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('contenus', function (Blueprint $table) {
            $table->id(); // BIGINT
            $table->string('titre');
            $table->text('contenu');

            // Fix foreign keys
            $table->unsignedBigInteger('id_type_contenu')->nullable();
            $table->unsignedBigInteger('id_type_media')->nullable();
            $table->unsignedBigInteger('id_region')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();

            $table->timestamps();
        });

        Schema::table('contenus', function (Blueprint $table) {
            $table->foreign('id_type_contenu')->references('id_type_contenu')->on('typecontenus')->onDelete('set null');
            $table->foreign('id_type_media')->references('id_type_media')->on('typemedias')->onDelete('set null');
            $table->foreign('id_region')->references('id_region')->on('regions')->onDelete('set null');
            $table->foreign('parent_id')->references('id')->on('contenus')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('contenus', function (Blueprint $table) {
            $table->dropForeign(['id_type_contenu']);
            $table->dropForeign(['id_type_media']);
            $table->dropForeign(['id_region']);
            $table->dropForeign(['parent_id']);
        });

        Schema::dropIfExists('contenus');
    }
};
