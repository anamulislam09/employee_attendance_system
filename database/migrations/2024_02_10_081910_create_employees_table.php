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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('f_name')->nullable();
            $table->string('m_name')->nullable();
            $table->string('spouse')->nullable();
            $table->string('contact');
            $table->string('blood_group')->nullable();
            $table->integer('gender')->nullable();
            $table->bigInteger('salary')->nullable();
            $table->integer('dept_id')->nullable();
            $table->string('join_date')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('email');
            $table->text('address')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
