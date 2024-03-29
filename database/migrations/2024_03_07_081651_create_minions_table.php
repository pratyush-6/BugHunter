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
        Schema::create('minions', function (Blueprint $table) {
            $table->id();
            $table->string('empid');
            $table->string('username');
            $table->string('emailaddress');
            $table->string('mobilenumber');
            $table->string('roles')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minions');
    }
};
