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
    // $table->string('emp_code')->unique();
    $table->unsignedBigInteger('user_id')->nullable();
    $table->string('firstname');
    $table->string('lastname');
    $table->string('department');
    $table->string('email')->unique();
    $table->string('password');
    $table->string('mno', 15);
    $table->string('gender');
    $table->date('birthdate');
    $table->text('address');
    $table->string('country');
    $table->string('city');
    
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
