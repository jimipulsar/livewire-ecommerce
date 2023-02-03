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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('item_name', 255)->nullable();
            $table->string('item_code')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->text('img_01')->nullable();
            $table->text('img_02')->nullable();
            $table->text('img_03')->nullable();
            $table->text('link')->nullable();
            $table->text('link_2')->nullable();
            $table->text('attachment')->nullable();
            $table->string('links')->nullable();
            $table->string('base_width')->nullable();
            $table->string('base_height')->nullable();
            $table->string('base_depth')->nullable();
            $table->string('base_weight')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->string('published')->default(0)->nullable();
            $table->string('stock_qty')->default('1')->nullable();
            $table->string('quantity')->default('1')->nullable();
            $table->text('slug')->nullable();
            $table->boolean('shippable')->default(false);
            $table->biginteger('user_id')->default(1)->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('products');
    }
};
