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
        Schema::create('signuppage_modules', function (Blueprint $table) {
            $table->id();
            $table->string('section')->nullable($value = true);
            $table->string('page')->nullable($value = true);
            $table->string('pageTitle')->nullable($value = true);
            $table->string('pageSlogan')->nullable($value = true);
            $table->string('formTitle')->nullable($value = true);
            $table->string('formSlogan')->nullable($value = true);
            $table->string('btnText')->nullable($value = true);
            $table->string('btnUrl')->nullable($value = true);
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
        Schema::dropIfExists('signuppage_modules');
    }
};
