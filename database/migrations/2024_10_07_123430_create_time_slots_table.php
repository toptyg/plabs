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
        Schema::create('time_slots', function (Blueprint $table) {
	    $table->id();
            $table->enum('type', ['phys', 'tech']);
            $table->foreignId('lab_id')->constrained()->onDelete('cascade');
            $table->dateTime('datetime');
            $table->timestamps();
        

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_slots');
    }
};