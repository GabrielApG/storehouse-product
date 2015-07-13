<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorehouseProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storehouse_product_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('storehouse_product_category_id')->unsigned()->nullable();
            $table->string('name', 45)->unique('name');
            $table->text('description')->nullable();
            $table->foreign('storehouse_product_category_id', 'fk_wh_prod_cat_id')->references('id')->on('storehouse_product_categories');
            //$table->bigInteger('created_by')->unsigned();
            //$table->bigInteger('updated_by')->unsigned();
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storehouse_product_categories');
    }
}
