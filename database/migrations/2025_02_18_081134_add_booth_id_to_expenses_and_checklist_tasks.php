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
        Schema::table('expenses', function (Blueprint $table) {
            $table->foreignId('booth_id')->after('id')->constrained()->onDelete('cascade');
        });

        Schema::table('checklist_tasks', function (Blueprint $table) {
            $table->foreignId('booth_id')->after('id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropForeign(['booth_id']);
            $table->dropColumn('booth_id');
        });

        Schema::table('checklist_tasks', function (Blueprint $table) {
            $table->dropForeign(['booth_id']);
            $table->dropColumn('booth_id');
        });
    }
};
