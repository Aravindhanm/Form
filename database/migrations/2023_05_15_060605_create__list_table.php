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
        Schema::create('_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('profile');
            $table->string('name');
            $table->string('email')->unique();
            $table->date('dob');
            $table->string('mob');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_list');
    }
};
