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
        Schema::create('users_studes', function (Blueprint $table) {
            $table->id();
            $table->integer('uid');
            $table->text('stname');
            $table->text('special');
            $table->string('university');
            $table->string('collage');
            $table->date('date1');
            $table->date('date2');
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
        Schema::dropIfExists('users_studes');
    }
};
