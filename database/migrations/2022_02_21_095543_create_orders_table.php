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
            $table->string('order_number');
            $table->string('email')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending');
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_shipped')->default(false);
            $table->float('grand_total', 12, 2);
            $table->integer('item_count')->default('1');
            $table->float('discount', 5, 2)->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_surname')->nullable();
            $table->string('shipping_company')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_province')->nullable();
            $table->string('shipping_zipcode')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('notes')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('billing_surname')->nullable();
            $table->string('billing_company')->nullable();
            $table->string('billing_vat')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_province')->nullable();
            $table->string('billing_zipcode')->nullable();
            $table->string('billing_phone')->nullable();
            $table->biginteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->enum('payment_method', ['cash_on_delivery', 'paypal', 'wire transfer', 'card'])->nullable();
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
