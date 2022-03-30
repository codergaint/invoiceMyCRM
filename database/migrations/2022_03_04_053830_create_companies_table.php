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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('companyName')->nullable($value = true);
            $table->string('email')->nullable($value = true);
            $table->string('phoneNumber')->nullable($value = true);
            $table->string('loginPass')->nullable($value = true);
            $table->string('plainPass')->nullable($value = true);
            $table->string('packId')->nullable($value = true);
            $table->string('status')->nullable($value = true);
            $table->string('website')->nullable($value = true);
            $table->string('address')->nullable($value = true);
            $table->string('currId')->nullable($value = true);
            $table->string('langId')->nullable($value = true);
            $table->string('tzId')->nullable($value = true);
            $table->string('logo')->nullable($value = true);
            $table->text('details')->nullable($value = true);
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
        Schema::dropIfExists('companies');
    }
};
