<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('owner_type');
            $table->string('owner_id');
            $table->string('type');
            $table->string('subject');
            $table->date('event_date');
            $table->bigInteger('amount')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
