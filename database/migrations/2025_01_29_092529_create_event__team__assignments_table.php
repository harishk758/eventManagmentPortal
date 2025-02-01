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
        Schema::create('event__team__assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('booth_id');
            $table->unsignedBigInteger('member_id');
            $table->text('description');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('booth_id')->references('id')->on('booths')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('team__members')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event__team__assignments');
    }
};
