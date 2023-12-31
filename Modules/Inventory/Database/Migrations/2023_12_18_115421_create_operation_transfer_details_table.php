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
        Schema::create('operation_transfer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('operation_transfer_id')->nullable();
            $table->string('product_name');
            $table->string('description')->nullable();
            $table->date('schedule_date')->nullable();
            $table->date('deadline_date')->nullable();
            $table->decimal('demand')->nullable();
            $table->decimal('quantity')->nullable();
            $table->boolean('picked')->default(false);

            $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();
            $table->foreign('operation_transfer_id')->references('id')->on('operation_transfers')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operation_transfer_details');
    }
};
