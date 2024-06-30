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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('page_meta_id');
            $table->string('status')->default('draft');
            $table->string('package_name');
            $table->string('package_location');
            $table->string('actual_price')->nullable();
            $table->string('payable_price');
            $table->json('tags');
            $table->json('infos');
            $table->json('images');
            $table->string('video')->nullable();
            $table->text('intro_text');
            $table->text('body_text');
            $table->json('included_excluded');
            $table->json('tour_plan');
            $table->string('tour_map');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
