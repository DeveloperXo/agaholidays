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
        Schema::create('page_metas', function (Blueprint $table) {
            $table->id();
            $table->string('page_title');
            $table->string('status')->default('draft');
            $table->string('page_meta_title')->nullable();
            $table->string('page_meta_description')->nullable();
            $table->string('page_url')->nullable();
            $table->string('page_name');
            $table->string('banner_title')->nullable();
            $table->string('banner_text')->nullable();
            $table->string('banner_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_metas');
    }
};
