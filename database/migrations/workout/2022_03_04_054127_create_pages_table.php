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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('pageName')->nullable($value=true);
            $table->string('url')->nullable($value=true);
            $table->string('content')->nullable($value=true);
            $table->string('metaTitle')->nullable($value=true);
            $table->string('metaDesc')->nullable($value=true);
            $table->string('metaKeyword')->nullable($value=true);
            $table->string('metaImg')->nullable($value=true);
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
        Schema::dropIfExists('pages');
    }
};
