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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('isbn');
            $table->text('description');
            $table->date('published_at');
            $table->integer('tottle_copies')->default('1');
            $table->integer('avalible_copies')->default('1');
            $table->string('cover_imges');
            $table->enum('statuse',['avalible','unavalible'])->default('avalible');
            $table->foreignId('author_id')->constrained('authores')->CasCadeOnDelete();
            $table->string('genra');
            $table->timestamps();
            $table->index(['title','author_id']);
            $table->index(['isbn']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
