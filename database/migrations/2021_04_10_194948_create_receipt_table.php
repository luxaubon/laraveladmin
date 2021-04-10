<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receipt_number')->nullable();
            $table->string('receipt_date')->nullable();
            $table->string('receipt_price')->nullable();
            $table->integer('receipt_product_1')->nullable();
            $table->integer('receipt_product_2')->nullable();
            $table->integer('receipt_product_3')->nullable();
            $table->integer('receipt_product_4')->nullable();
            $table->integer('receipt_product_5')->nullable();
            $table->integer('receipt_product_6')->nullable();
            $table->integer('receipt_status')->nullable();
            $table->integer('receipt_point')->nullable();
            $table->integer('receipt_admin_id')->nullable();
            $table->string('receipt_reject')->nullable();
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
        Schema::dropIfExists('receipt');
    }
}
