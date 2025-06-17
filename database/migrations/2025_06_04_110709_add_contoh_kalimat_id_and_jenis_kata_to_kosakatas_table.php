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
        Schema::table('kosakatas', function (Blueprint $table) {
            $table->string('contoh_kalimat_id')->nullable()->after('kata_indonesia'); // ubah dari unsignedBigInteger ke string
            $table->string('jenis_kata')->nullable()->after('contoh_kalimat_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kosakatas', function (Blueprint $table) {
            if (Schema::hasColumn('kosakatas', 'contoh_kalimat_id')) {
                $table->dropColumn('contoh_kalimat_id');
            }
            if (Schema::hasColumn('kosakatas', 'jenis_kata')) {
                $table->dropColumn('jenis_kata');
            }
        });
    }
};
