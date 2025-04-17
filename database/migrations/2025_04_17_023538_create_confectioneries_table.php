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
        Schema::create('confectioneries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cep');
            $table->string('road');
            $table->string('number');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->string('telephone');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confectioneries');
    }
};
