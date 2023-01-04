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
        Schema::create('tenant_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('lot_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignUuid('tenant_id')->index()->constrained('users')->cascadeOnDelete();
            $table->date('payment_date')->nullable();
            $table->string('rent_month')->nullable();
            $table->string('trans_id')->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->string('payment_method')->default('cash')->comment('cash, online');
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
        Schema::dropIfExists('tenant_payments');
    }
};
