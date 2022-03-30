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
        Schema::create('payment_credentials', function (Blueprint $table) {
            $table->id();
            $table->string('paypalClientId')->nullable($value = true);
            $table->string('paypalSecret')->nullable($value = true);
            $table->string('paypalEnvironment')->nullable($value = true);
            $table->string('paypalWebhookUrl')->nullable($value = true);
            $table->string('paypalStatus')->nullable($value = true);
            $table->string('stripeId')->nullable($value = true);
            $table->string('stripeSecret')->nullable($value = true);
            $table->string('stripeWebhookSecret')->nullable($value = true);
            $table->string('stripeWebhookUrl')->nullable($value = true);
            $table->string('stripeStatus')->nullable($value = true);
            $table->string('mollieAPI')->nullable($value = true);
            $table->string('mollieStatus')->nullable($value = true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_credentials');
    }
};
