<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->biginteger('tracking_number')->unsigned()->nullable();
            $table->foreign('tracking_number')->references('id')->on('orders');
            $table->string('packlink_name')->nullable();
            $table->string('packlink_content')->nullable();
            $table->string('packlink_city')->nullable();
            $table->string('packlink_country')->nullable();
            $table->string('packlink_date')->nullable();
            $table->string('packlink_order_id')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('shipments');
    }
}
