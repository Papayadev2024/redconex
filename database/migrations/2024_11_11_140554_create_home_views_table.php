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
        Schema::create('home_views', function (Blueprint $table) {
            $table->id();

            $table->string('subtitle1section')->nullable();
            $table->string('title1section')->nullable();

            $table->string('subtitle2section')->nullable();
            $table->string('title2section')->nullable();

            $table->string('subtitle3section')->nullable();
            $table->string('title3section')->nullable();

            $table->string('title4section')->nullable();

            $table->string('subtitle5section')->nullable();
            $table->string('title5section')->nullable();
            $table->string('title5section2')->nullable();
            $table->string('title5section3')->nullable();


            $table->string('subtitle6section')->nullable();
            $table->string('title6section')->nullable();
            $table->string('title6section2')->nullable();
            $table->string('title6section3')->nullable();
         

            $table->string('subtitle7section')->nullable();
            $table->string('title7section')->nullable();
            $table->string('title7section2')->nullable();
            $table->string('title7section3')->nullable();
            $table->text('description7section')->nullable();
            

            $table->string('title8section')->nullable();
            $table->string('title8section2')->nullable();
            $table->string('title8section3')->nullable();

            $table->string('subtitle9section')->nullable();
            $table->string('title9section')->nullable();
            $table->string('url_9section')->nullable();

            $table->string('subtitle10section')->nullable();
            $table->string('title10section')->nullable();

            $table->string('subtitle11section')->nullable();
            $table->string('title11section')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_views');
    }
};
