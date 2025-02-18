<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('owner_type',32);
            $table->string('owner_id',64);
            $table->index(['owner_id','owner_type',],'idx_owner');
            $table->string('type');
            $table->string('subject');
            $table->date('event_date')->nullable();
            $table->string('color')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
