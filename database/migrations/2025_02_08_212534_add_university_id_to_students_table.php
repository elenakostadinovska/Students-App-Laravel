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
        Schema::table('students', function (Blueprint $table) {
            // Add the 'university_id' column
            $table->unsignedBigInteger('university_id')->nullable()->after('image_upload');

            // Add the foreign key constraint
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Remove the foreign key and column in case of rollback
            $table->dropForeign(['university_id']);
            $table->dropColumn('university_id');
        });
    }
};
