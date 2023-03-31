<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('calculators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->text('expression')->nullable();
            $table->text('result')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calculators');
    }
};
