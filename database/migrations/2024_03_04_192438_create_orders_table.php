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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('f_name');
            $table->string('l_name');
            $table->boolean('paid')->default(0);//not paid
            $table->boolean('method')->default(1);//cash
            $table->boolean('delivered')->default(0);//not delivered
            $table->boolean('registered')->default(0);//not registered
            $table->boolean('offer')->default(0);//no offer
            $table->double('total_lbp');
            $table->integer('total_pts');
            $table->double('total_usd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
