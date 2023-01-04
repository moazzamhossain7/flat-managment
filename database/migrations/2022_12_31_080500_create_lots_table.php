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
        Schema::create('lots', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('owner_id')->index()->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('location_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('type')->default('apartment')->comment('apartment, duplex, triplex, building, villa');
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->string('property_id')->nullable();
            $table->string('lot_area')->nullable();
            $table->string('home_area')->nullable();
            $table->string('rooms')->nullable();
            $table->string('beds')->nullable();
            $table->string('baths')->nullable();
            $table->string('built')->nullable();
            $table->double('price', 12, 2)->nullable();
            $table->string('rent_type')->default('monthly')->comment('monthly, yearly');
            $table->string('feature')->nullable();
            $table->text('amenities')->nullable();
            $table->text('lat')->nullable();
            $table->text('lang')->nullable();
            $table->string('status')->default('for rent')->comment('for rent, rented, for sale');
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
        Schema::dropIfExists('lots');
    }
};
