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
            $table->string('order_number', 20)->nullable();
            $table->double('subtotal', 8, 2)->default(0);
            $table->double('tax', 8, 2)->default(0);
            $table->double('delivery_charge', 8, 2)->default(0);
            $table->double('total', 8, 2)->default(0);
            $table->string('status');
            $table->string('customer_name', 50);
            $table->string('customer_email', 50);
            $table->string('customer_phone', 20);
            $table->string('customer_address_1', 200);
            $table->string('customer_address_2', 200)->nullable();
            $table->string('customer_address_area', 200);
            $table->string('customer_address_zip', 10);
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
