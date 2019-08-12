<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('email')->nullable();
            $table->longText('social')->nullable();
            $table->longText('seo')->nullable();
            $table->longText('image')->nullable();
            $table->longText('imagefb')->nullable();
            $table->longText('address_th')->nullable();
            $table->longText('address_en')->nullable();
            $table->longText('payment')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
