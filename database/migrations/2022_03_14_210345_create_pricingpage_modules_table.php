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
        Schema::create('pricingpage_modules', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable($value = true);
            $table->string('section')->nullable($value = true);
            $table->string('title')->nullable($value = true);
            $table->string('slogan')->nullable($value = true);
            $table->string('description')->nullable($value = true);
            $table->string('logo')->nullable($value = true);
            $table->string('btnTxt')->nullable($value = true);
            $table->string('btnUrl')->nullable($value = true);
            $table->string('boxIcon')->nullable($value = true);
            $table->string('boxHeading')->nullable($value = true);
            $table->string('boxText')->nullable($value = true);
            $table->string('status')->nullable($value = true);
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
        Schema::dropIfExists('pricingpage_modules');
    }
};
