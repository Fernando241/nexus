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

            $table->string('presentation')->nullable();

            $table->text('description')->nullable();

            $table->text('indications')->nullable();

            $table->text('contraindications')->nullable();

            $table->json('ingredients')->nullable();

            $table->decimal('purchase_price', 12, 2)->nullable();

            $table->decimal('sale_price', 12, 2)->nullable();

            $table->string('image_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn([
                'presentation',
                'description',
                'indications',
                'contraindications',
                'ingredients',
                'purchase_price',
                'sale_price',
                'image_path',
            ]);
        });
    }
};
