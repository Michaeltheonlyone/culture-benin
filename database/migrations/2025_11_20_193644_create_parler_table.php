<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('parler', function (Blueprint $table) {
            $table->id();
            $table->string('langue');
            $table->unsignedBigInteger('id_region')->nullable();
            $table->timestamps();
        });

        Schema::table('parler', function (Blueprint $table) {
            $table->foreign('id_region')->references('id_region')->on('regions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('parler', function (Blueprint $table) {
            $table->dropForeign(['id_region']);
        });

        Schema::dropIfExists('parler');
    }
};
