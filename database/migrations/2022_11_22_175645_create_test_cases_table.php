<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('test_cases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('problem_id');
            $table->string('input');
            $table->string('output');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('test_cases');
    }
};
