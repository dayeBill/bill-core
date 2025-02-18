<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('owner_type', 32);
            $table->string('owner_id', 64);
            $table->index(['owner_id', 'owner_type',], 'idx_owner');
            $table->string('name');
            $table->string('alias')->nullable();
            $table->string('relation_type')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('remarks')->nullable();
            $table->bigInteger('sort')->default(0)->comment('排序');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
