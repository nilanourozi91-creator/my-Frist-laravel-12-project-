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
        Schema::create('barrowings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('member_id')->constrained('members')->CasCadeOnDelete();
            $table->foreignId('book_id')->constrained('books')->CasCadeOnDelete();
            $table->date('barrow_date');
            $table->date('due_date');
            $table->date('bring_date')->nullable();
            $table->enum('stutas',['returned','barrowed','overdue'])->default('barrowed');
            $table->timestamps();
            $table->index(['member_id','stutas']);
            $table->index(['due_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barrowings');
    }
};
