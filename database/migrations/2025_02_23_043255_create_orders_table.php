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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('payment_id')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('payment_status')->nullable();
            $table->string('contact')->nullable();
            $table->text('p_address')->nullable();
            $table->text('d_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('pincode')->nullable();
            $table->string('order_status')->default('ordered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
