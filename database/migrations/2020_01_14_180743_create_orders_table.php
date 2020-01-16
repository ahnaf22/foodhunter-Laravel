<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('shop_id')->unsigned();

            $table->unsignedInteger('total_price');
            $table->string('ip_address');
            $table->string('phone_no');
            $table->string('order_type');
            $table->string('dine_time')->nullable();
            $table->text('delivery_address')->nullable();
            $table->text('instructions')->nullable();
            $table->tinyInteger('is_confirmed')->default(0);
            $table->tinyInteger('is_paid')->default(0);
            $table->tinyInteger('is_completed')->default(0);
            $table->tinyInteger('is_seenbyseller')->default(0);
            

            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            
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
}
