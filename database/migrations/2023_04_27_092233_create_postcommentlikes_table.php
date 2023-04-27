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
        Schema::create('postcommentlikes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->default(null); 
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade')->onUpdate('cascade')->default(0);
            $table->foreignId('comment_id')->constrained('postcomments')->onDelete('cascade')->onUpdate('cascade')->default(0);
            $table->boolean('is_like')->default(0);
            $table->boolean('is_dislike')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postcommentlikes');
    }
};
