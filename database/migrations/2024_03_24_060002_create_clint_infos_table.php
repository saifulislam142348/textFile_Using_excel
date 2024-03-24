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
        Schema::create('clint_infos', function (Blueprint $table) {
            $table->id();
            $table->string('application_date')->nullable();
            $table->string('Expiration_date')->nullable();
            $table->string('name')->nullable();
            $table->string('relative_name')->nullable();
            $table->string('birth_day')->nullable();
            $table->string('phone')->nullable();
            $table->string('nid')->nullable();
            $table->string('passport')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clint_infos');
    }
};
