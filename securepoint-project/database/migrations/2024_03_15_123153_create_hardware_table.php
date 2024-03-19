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
        Schema::create('hardware', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('mac')->nullable();
            $table->string('architecture')->nullable();
            $table->string('machine')->nullable();
            $table->string('mem')->nullable();
            $table->string('cpu')->nullable();
            $table->integer('disk_root')->nullable();
            $table->string('disk_data')->nullable();
            $table->string('uptime')->nullable();
            $table->string('fwversion')->nullable();
            $table->string('l2tp')->nullable();
            $table->integer('qos')->nullable();
            $table->string('httpaveng')->nullable();
            $table->integer('spcf')->nullable();
            $table->boolean('footer')->nullable();     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware');
    }
};
