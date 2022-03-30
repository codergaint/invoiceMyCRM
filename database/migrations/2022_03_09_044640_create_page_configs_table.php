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
        Schema::create('page_configs', function (Blueprint $table) {
            $table->id();
            $table->string('pageName')->nullable($value = true);
            $table->string('pageTitle')->nullable($value = true);
            $table->string('pageRules')->nullable($value = true);
            $table->string('pageType')->nullable($value = true);
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
        Schema::dropIfExists('page_configs');
    }
};
