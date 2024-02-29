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
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('map')->nullable();
            $table->string('location')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('dribble')->nullable();
            $table->string('medium')->nullable();
            $table->string('behance')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('youtube')->nullable();
            $table->string('discord')->nullable();
            $table->string('threads')->nullable();
            $table->string('snapchat')->nullable();


            $table->string('phone_sh')->default(1);
            $table->string('email_sh')->default(1);
            $table->string('map_sh')->default(1);
            $table->string('location_sh')->default(1);
            $table->string('linkedin_sh')->default(1);
            $table->string('tiktok_sh')->default(1);
            $table->string('instagram_sh')->default(1);
            $table->string('facebook_sh')->default(1);
            $table->string('twitter_sh')->default(1);
            $table->string('dribble_sh')->default(1);
            $table->string('medium_sh')->default(1);
            $table->string('behance_sh')->default(1);
            $table->string('whatsapp_sh')->default(1);
            $table->string('youtube_sh')->default(1);
            $table->string('discord_sh')->default(1);
            $table->string('threads_sh')->default(1);
            $table->string('snapchat_sh')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socials');
    }
};
