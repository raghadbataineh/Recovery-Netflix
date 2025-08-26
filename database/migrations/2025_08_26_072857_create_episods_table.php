<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episods', function (Blueprint $table) {
                $table->id();
                $table->foreignId('series_id')->constrained()->cascadeOnDelete();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('video_url'); 
                $table->unsignedInteger('duration')->nullable(); 
                $table->date('release_date')->nullable();
                $table->timestamps();
                $table->index(['series_id','release_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episods');
    }
};
