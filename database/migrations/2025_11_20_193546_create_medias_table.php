<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('titre_media')->nullable();

            $table->unsignedBigInteger('id_type_media')->nullable();
            $table->unsignedBigInteger('id_contenu')->nullable();

            $table->timestamps();
        });

        Schema::table('medias', function (Blueprint $table) {
            $table->foreign('id_type_media')->references('id_type_media')->on('typemedias')->onDelete('set null');
            $table->foreign('id_contenu')->references('id')->on('contenus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('medias', function (Blueprint $table) {
            $table->dropForeign(['id_type_media']);
            $table->dropForeign(['id_contenu']);
        });

        Schema::dropIfExists('medias');
    }
};
