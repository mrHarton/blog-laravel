<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable(); // Guests can rate
            $table->integer('rating')->check('rating >= 1 and rating <= 5'); // 1 to 5 stars
            $table->string('ip_address'); // Track guest ratings
            $table->timestamps();

            $table->unique(['post_id', 'user_id']); // Prevent duplicate ratings from users
            $table->unique(['post_id', 'ip_address']); // Prevent duplicate ratings from guests
        });
    }

    public function down() {
        Schema::dropIfExists('ratings');
    }
};
