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
            $table->string('contoh_kalimat')->nullable()->after('kata_indonesia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kosakatas', function (Blueprint $table) {
            if (Schema::hasColumn('kosakatas', 'contoh_kalimat')) {
                $table->dropColumn('contoh_kalimat');
            }
        });
    }
};
