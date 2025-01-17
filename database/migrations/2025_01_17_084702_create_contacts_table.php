<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('owner_type');
            $table->string('owner_id');
            $table->string('name');
            $table->string('relation_type')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('remarks');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
