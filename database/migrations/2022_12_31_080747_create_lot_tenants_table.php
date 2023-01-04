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
        Schema::create('lot_tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('lot_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignUuid('tenant_id')->index()->constrained('users')->cascadeOnDelete();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->double('agreed_rent', 8, 2)->nullable();
            $table->boolean('status')->default(false)->comment('0=Current, 1=Complete');
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
        Schema::dropIfExists('lot_tenants');
    }
};
