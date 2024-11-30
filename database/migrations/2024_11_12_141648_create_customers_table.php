<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('region_id');
            $table->timestamps();
            $table->foreign('region_id')->references('id')->on('regions');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
