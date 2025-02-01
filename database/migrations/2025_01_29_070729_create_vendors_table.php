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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booth_id');
            $table->string('vendor_name');
            $table->string('vendor_company');
            $table->string('vendor_email');
            $table->string('vendor_address');
            $table->string('vendor_city');
            $table->string('country_id');
            $table->text('vendor_description');
            $table->foreign('booth_id')->references('id')->on('booths')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
