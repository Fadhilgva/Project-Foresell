<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_produk', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->timestamps();
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('store_id');
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedInteger('price');
            $table->unsignedInteger('stock');
            $table->unsignedInteger('sold');
            $table->unsignedInteger('dicount');
            $table->text('desc');
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('data_produk');
    }
}
