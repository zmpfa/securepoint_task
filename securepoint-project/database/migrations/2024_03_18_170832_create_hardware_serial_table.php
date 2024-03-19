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
        Schema::create('hardware_serial', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('hardware_id');
            $table->unsignedBiginteger('serial_id');


            $table->foreign('hardware_id')->references('id')
                 ->on('hardware')->onDelete('cascade');
            $table->foreign('serial_id')->references('id')
                ->on('serials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_serial');
    }
};
