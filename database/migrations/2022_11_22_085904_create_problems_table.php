<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->string('title');
            $table->text('description');
            $table->string('score');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('problems');
    }
};
