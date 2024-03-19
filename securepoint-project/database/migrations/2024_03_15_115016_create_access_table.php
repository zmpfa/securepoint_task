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
        Schema::create('accesses', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('public_ip')->nullable();
            $table->string('name_update_server')->nullable();
            $table->dateTime('date_time')->nullable();
            $table->string('url_http_protocol_version')->nullable();
            $table->integer('http_response')->nullable();
            $table->integer('size_response')->nullable();
            $table->string('name_proxy')->nullable();
            $table->integer('request_time')->nullable();
            $table->string('serial')->nullable();
            $table->string('firmware_version')->nullable();
            $table->text('specs')->nullable();
            $table->string('not_after')->nullable();
            $table->string('remaining_days')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accesses');
    }
};
