<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('owner_type', 32);
            $table->string('owner_id', 64);
            $table->index(['owner_id', 'owner_type',], 'idx_owner');

            $table->string('bill_type');
            $table->string('bill_category')->nullable();
            $table->timestamp('bill_time');
            $table->string('amount_currency')->default('CNY');
            $table->bigInteger('amount_value')->default(0);


            $table->string('payee_type')->nullable();
            $table->string('payee_id')->nullable();
            $table->string('pay_method')->nullable();
            $table->string('subject')->nullable();
            $table->string('remarks')->nullable();

            $table->unsignedBigInteger('event_id')->nullable();
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
