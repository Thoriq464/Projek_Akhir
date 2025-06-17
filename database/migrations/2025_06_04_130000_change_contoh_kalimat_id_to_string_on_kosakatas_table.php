<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('kosakatas', function (Blueprint $table) {
            $table->string('contoh_kalimat_id_tmp')->nullable()->after('kata_indonesia');
        });
        // Copy data
        DB::statement('UPDATE kosakatas SET contoh_kalimat_id_tmp = CAST(contoh_kalimat_id AS CHAR)');
        // Drop old column
        Schema::table('kosakatas', function (Blueprint $table) {
            $table->dropColumn('contoh_kalimat_id');
        });
        // Rename new column
        Schema::table('kosakatas', function (Blueprint $table) {
            $table->renameColumn('contoh_kalimat_id_tmp', 'contoh_kalimat_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kosakatas', function (Blueprint $table) {
            $table->unsignedBigInteger('contoh_kalimat_id')->nullable()->after('kata_indonesia');
        });
    }
};