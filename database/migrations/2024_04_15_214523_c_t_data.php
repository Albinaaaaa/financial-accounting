<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data', function (Blueprint $t) {
            $t->id();
            $t->integer('type_id');
            $t->integer('additional_type_id');
            $t->string('name');
            $t->bigInteger('amount');
            $t->integer('currency_id');
            $t->string('date');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
