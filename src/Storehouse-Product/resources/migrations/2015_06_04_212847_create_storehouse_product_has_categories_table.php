<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorehouseProductHasCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storehouse_product_has_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('storehouse_product_id')->unsigned();
            $table->bigInteger('storehouse_product_category_id')->unsigned();
            $table->foreign('storehouse_product_id', 'fk_wh_prod_id2')->references('id')->on('storehouse_products')->onDelete('cascade');
            $table->foreign('storehouse_product_category_id', 'fk_wh_prod_cat_id2')->references('id')->on('storehouse_product_categories')->onDelete('cascade');
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
        Schema::dropIfExists('storehouse_product_has_categories');
    }
}
