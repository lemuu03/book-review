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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('book_id'); //foreign key

            $table->text('review');
            $table->unsignedTinyInteger('rating');

            $table->timestamps();

            // $table->foreign('book_id')->references('id')->on('books')
            //     ->onDelete('cascade'); //reference a foreign key

            $table->foreignId('book_id')->constrained()
            ->cascadeOnDelete(); //shorter but the other one gives you more flexibility
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
