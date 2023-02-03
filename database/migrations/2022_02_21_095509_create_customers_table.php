<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('shipping_name')->nullable();
            $table->string('shipping_surname')->nullable();
            $table->string('shipping_company')->nullable();
            $table->string('shipping_vat')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_province')->nullable();
            $table->string('shipping_zipcode')->nullable();
            $table->string('shipping_phone')->nullable();
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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('customers');
    }
}
