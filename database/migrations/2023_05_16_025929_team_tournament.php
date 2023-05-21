<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('teams_tournaments', function (Blueprint $table) {
            $table->unsignedBigInteger('teams_id');
            $table->unsignedBigInteger('tournaments_id');
            $table->timestamps();
            
            $table->foreign('teams_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('tournaments_id')->references('id')->on('tournaments')->onDelete('cascade');
            
            $table->primary(['teams_id', 'tournaments_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams_tournaments');
    }
};

