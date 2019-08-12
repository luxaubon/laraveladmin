<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('sid')->nullable();
            $table->integer('code')->nullable();
            $table->integer('price')->nullable();
            $table->longText('seo')->nullable();
            //$table->longText('keyword')->nullable();
            //$table->longText('description')->nullable();
            $table->longText('title')->nullable();
            $table->longText('caption')->nullable();
            $table->longText('detail')->nullable();
            $table->longText('title_ss')->nullable();
            $table->longText('description_ss')->nullable();
            $table->longText('status')->nullable();
            $table->integer('online')->nullable();
            $table->text('image')->nullable();
            $table->text('slide')->nullable();
            $table->text('slidefacebook')->nullable();
            $table->text('gallery')->nullable();
            $table->integer('view')->nullable();
            $table->longText('date_start')->nullable();
            $table->longText('date_stop')->nullable();
           // $table->longText('tags')->nullable();
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
}
