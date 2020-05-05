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
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('order_number')->nullable();
            $table->double('subtotal', 8, 2)->default(0);
            $table->double('tax', 8, 2)->default(0);
            $table->double('delivery', 8, 2)->default(0);
            $table->double('total', 8, 2)->default(0);
            $table->string('status');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_address_1');
            $table->string('customer_address_2')->nullable();
            $table->string('customer_address_area');
            $table->string('customer_address_pincode');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
