<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku');
            $table->string('symbology');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('tax_id');
            $table->decimal('price', 8, 2);
            $table->integer('qty');
            $table->integer('alert_qty');
            $table->string('tax_method');
            $table->boolean('has_stock');
            $table->boolean('has_expiry_date');
            $table->date('expiry_date')->nullable();
            $table->text('details')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
