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
        Schema::create('ssl_ipn_logs', function (Blueprint $table) {
            $table->id();
            $table->string('tran_id')->nullable();
            $table->string('tran_date')->nullable();
            $table->double('amount', 10, 2)->nullable();
            $table->string('bank_tran_id')->nullable();
            $table->text('additional_data')->nullable();
            $table->string('status', 20)->nullable();
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
        Schema::dropIfExists('ssl_ipn_logs');
    }
};
