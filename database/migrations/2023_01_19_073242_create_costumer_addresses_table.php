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
        Schema::create('costumer_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('costomer_id')->references('id')->on('costomers')->onDelete('cascade');
            $table->foreignId('countrie_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreignId('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreignId('citie_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('address_title')->default('Main');
            $table->boolean('default_address')->default(false);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('zib_code')->nullable();
            $table->string('po_box')->nullable();
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
        Schema::dropIfExists('costumer_addresses');
    }
};
