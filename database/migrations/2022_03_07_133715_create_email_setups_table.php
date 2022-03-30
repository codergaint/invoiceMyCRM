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
        Schema::create('email_setups', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable($value=true);
            $table->string('formName')->nullable($value=true);
            $table->string('formEmail')->nullable($value=true);
            $table->string('host')->nullable($value=true);
            $table->string('port')->nullable($value=true);
            $table->string('userName')->nullable($value=true);
            $table->string('password')->nullable($value=true);
            $table->string('encType')->nullable($value=true);
            $table->string('status')->nullable($value=true);
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
        Schema::dropIfExists('email_setups');
    }
};
