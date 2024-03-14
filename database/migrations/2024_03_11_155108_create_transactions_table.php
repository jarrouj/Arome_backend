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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('f_name');
            $table->string('l_name');
            $table->string( 'email' );
            $table->string('phone');
            $table->integer('points');
            $table->boolean('addsub');//0=> - , 1=> + (if he bought items per points - if not add pts )
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
