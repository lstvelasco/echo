<?php

use App\Models\Announcement;
use App\Models\User;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'author_id');
            $table->foreignIdFor(Announcement::class);
            $table->string('content');
            $table->boolean('isFeatured')->default(false);
            $table->boolean('isVerified')->default(false);
            $table->foreignIdFor(User::class, 'verifier_id')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Add soft deletes here
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
