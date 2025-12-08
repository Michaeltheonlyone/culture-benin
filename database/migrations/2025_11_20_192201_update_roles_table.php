<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        // Change roles.id to BIGINT unsigned to match users.id_role
        DB::statement('ALTER TABLE roles MODIFY id BIGINT UNSIGNED AUTO_INCREMENT;');
    }

    public function down()
    {
        // Rollback: change back to INT
        DB::statement('ALTER TABLE roles MODIFY id INT UNSIGNED AUTO_INCREMENT ;');
    }
};
