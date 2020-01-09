<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->text('address');
            $table->string('nid')->unique()->nullable();
            $table->string('ip_address')->nullable();
            $table->string('avatar')->nullable();
            

            $table->tinyInteger('is_seller')->nullable()->default('0')->comment('seller:1 | non-seller: 0');
            $table->tinyInteger('is_offerer')->nullable()->default('0')->comment('offerer:1 | non-offerer: 0');
            $table->tinyInteger('is_active')->nullable()->default('0')->comment('active:1 | inactive: 0');
            $table->tinyInteger('is_verified_by_admin')->nullable()->default('0')->comment('verified:1 | non-verified: 0');
            $table->tinyInteger('is_email_verified')->nullable()->default('0')->comment('verified:1 | non-verified: 0');
            $table->tinyInteger('is_admin')->nullable()->default('0')->comment('admin:1 | non-admin: 0');
            $table->tinyInteger('seller_request')->nullable()->default('0')->comment('requested:1 | not-requested: 0');

            $table->timestamp('email_verified_at')->nullable();
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
}
