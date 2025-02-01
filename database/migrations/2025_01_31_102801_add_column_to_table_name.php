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
        Schema::table('team_members', function (Blueprint $table) {
            $table->string('aadhaar_front')->nullable()->after('date_of_joining');
            $table->string('aadhaar_back')->nullable()->after('aadhaar_front');
            $table->string('pancard')->nullable()->after('aadhaar_back');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            //
        });
    }
};
