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
        Schema::table('file_uploads_logs', function (Blueprint $table) {
            $table->string('ip')->nullable()->after('request_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('file_uploads_logs', function (Blueprint $table) {
            $table->dropColumn('ip');
        });
    }
};
