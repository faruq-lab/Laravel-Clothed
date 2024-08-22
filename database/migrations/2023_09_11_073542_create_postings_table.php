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
        Schema::create('postings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //when user account deleted, all their item also been deleted
            $table->string('brand');
            $table->string('picture')->nullable();
            $table->string('location');
            $table->decimal('price', 10, 2); // Represents a decimal column with 10 total digits and 2 decimal places
            $table->string('color');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postings');
    }
};
