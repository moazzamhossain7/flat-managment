<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id')->index()->constrained()->cascadeOnDelete();
            $table->uuid('lot_id')->index()->constrained()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('email', 30)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('address')->nullable();
            $table->string('transaction_id')->index()->nullable();
            $table->double('amount', 10, 2)->nullable();
            $table->string('currency', 20)->nullable();
            $table->string('pay_for')->default('rent')->comment('rent');
            $table->boolean('is_backend_payment')->default(false)->comment('0=No, 1=Yes');
            $table->longText('payload')->nullable();
            $table->string('status', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
