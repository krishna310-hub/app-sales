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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('invoiceNumber');
            $table->date('invoiceDate');
            $table->string('customerName');
            $table->string('customerEmail');
            $table->string('customerPhone');
            $table->string('customerState');
            $table->decimal('subTotal', 8, 2);
            $table->integer('quantity');
            $table->string('gstPercentage');
            $table->decimal('gstAmount', 8, 2); 
            $table->decimal('grandTotal', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
