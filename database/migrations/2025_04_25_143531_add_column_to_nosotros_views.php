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
        Schema::table('nosotros_views', function (Blueprint $table) {
            $table->string('link2section')->nullable();
            $table->string('link3section')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nosotros_views', function (Blueprint $table) {
            $table->dropColumn('link2section');
            $table->dropColumn('link3section');
        });
    }
};
