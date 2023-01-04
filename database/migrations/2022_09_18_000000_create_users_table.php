<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->index()->default('tenant')->comment('landlord, tenant');
            $table->string('phone')->index()->nullable();
            $table->string('avatar')->nullable();
            $table->string('profession')->nullable();
            $table->text('about')->nullable();
            $table->string('address')->nullable();
            $table->string('ip_addr')->nullable();
            $table->text('social_links')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->boolean('status')->index()->default(true);
            $table->boolean('is_online')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
