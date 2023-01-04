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
        Schema::create('org_infos', function (Blueprint $table) {
            $table->id();
            $table->string('org_name');
            $table->string('logo')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('hotline_numbers')->nullable();
            $table->string('skype')->nullable();
            $table->string('office_time')->nullable();
            $table->string('address')->nullable();
            $table->longText('social_links')->nullable();
            $table->string('google_api_key')->nullable();
            $table->string('lat')->nullable();
            $table->string('lang')->nullable();
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
        Schema::dropIfExists('org_infos');
    }
};
