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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('api');
            $table->string('info_guide')->nullable();
            $table->double('shipping_cost');
            $table->string('shipping_text')->nullable();
            $table->string('additional_info')->nullable();
            $table->double('subscriber_discount')->nullable();
            $table->string('new_user')->nullable();
            $table->string('pixel')->nullable();
            $table->string('meta_script')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generals');
    }
};
