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
        Schema::table('articles', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('activities', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('research', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('activities', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('research', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
