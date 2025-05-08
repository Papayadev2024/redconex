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
            $table->string('subtitle5section')->nullable();
            $table->string('title5section')->nullable();
            $table->text('description5section')->nullable();
            $table->string('url_image5section')->nullable();
            
            $table->string('title6section')->nullable();
            $table->text('description6section')->nullable();
            $table->string('url_image6section')->nullable();

            $table->string('title7section')->nullable();
            $table->text('description7section')->nullable();
            $table->string('url_image7section')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nosotros_views', function (Blueprint $table) {
            $table->dropColumn('subtitle5section');
            $table->dropColumn('title5section');
            $table->dropColumn('description5section');
            $table->dropColumn('url_image5section');

            $table->dropColumn('title6section');
            $table->dropColumn('description6section');
            $table->dropColumn('url_image6section');

            $table->dropColumn('title7section');
            $table->dropColumn('description7section');
            $table->dropColumn('url_image7section');
        });
    }
};
