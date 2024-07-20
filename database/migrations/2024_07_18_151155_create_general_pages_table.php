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
        // not implemented yet. once you have done it, remove this comment.
        Schema::create('general_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_meta_id');
            $table->foreign('page_meta_id')
                ->references('id')
                ->on('page_metas')
                ->onDelete('cascade');
            $table->string('page_title');
            $table->string('slug')->unique();
            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->text('body');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_pages');
    }
};
