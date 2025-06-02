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
        Schema::table('generals', function (Blueprint $table) {
            $table->text('reclamo_header')->nullable();
            $table->text('reclamo_footer')->nullable();
            $table->text('reclamo_one')->nullable();
            $table->text('reclamo_two')->nullable();
            $table->text('reclamo_tree')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('generals', function (Blueprint $table) {
            $table->dropColumn('reclamo_header');
            $table->dropColumn('reclamo_footer');
            $table->dropColumn('reclamo_one');
            $table->dropColumn('reclamo_two');
            $table->dropColumn('reclamo_tree');
        });
    }
};
