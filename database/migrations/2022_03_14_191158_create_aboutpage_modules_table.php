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
        Schema::create('aboutpage_modules', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable($value = true);
            $table->string('section')->nullable($value = true);
            $table->string('pageTitle')->nullable($value = true);
            $table->string('pageContent')->nullable($value = true);
            $table->string('pageLogo')->nullable($value = true);
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
        Schema::dropIfExists('aboutpage_modules');
    }
};
