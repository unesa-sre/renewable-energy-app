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
        Schema::table('products', function (Blueprint $table) {
            $table->text('image')->nullable()->change();
        });

        // Migrate existing single image strings to JSON arrays
        $products = \Illuminate\Support\Facades\DB::table('products')->get();
        foreach ($products as $product) {
            if ($product->image && !str_starts_with($product->image, '[')) {
                $newImage = json_encode([$product->image]);
                \Illuminate\Support\Facades\DB::table('products')
                    ->where('id', $product->id)
                    ->update(['image' => $newImage]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }
};
