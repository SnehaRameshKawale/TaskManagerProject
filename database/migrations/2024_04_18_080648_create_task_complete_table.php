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
        Schema::create('CompletedTask', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title')->unique();
            $table->text('description');
            $table->enum('priority',['high','low','medium'])->default('medium');
            $table->timestamp('duedate');
            $table->timestamp('complete')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('CompletedTask', function (Blueprint $table) {
            //
        });
    }
};
