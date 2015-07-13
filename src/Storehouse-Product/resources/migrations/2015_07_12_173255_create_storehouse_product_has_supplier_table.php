<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorehouseProductHasSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storehouse_product_has_suppliers', function (Blueprint $table) {
            $typeKey=config('storehouse-product.supplier.typeKey');

            $table->engine = 'InnoDB';
            $table->bigInteger('storehouse_product_id')->unsigned();
            $table->$typeKey('storehouse_product_supplier_id', config('storehouse-product.supplier.lengthKey'))
                ->unsigned();

/****Relacionamento  de tabelas*
            $table->foreign('storehouse_product_id', 'fk_wh_prod_id3')
                ->references('id')
                ->on('storehouse_products')
                ->onDelete('cascade');
            $table->foreign('storehouse_product_supplier_id', 'fk_wh_prod_supp_id')
                ->references(config('storehouse-product.supplier.primaryKey'))
                ->on(config('storehouse-product.supplier.table'))
                ->onDelete('cascade');
//*/
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
        Schema::dropIfExists('storehouse_product_has_suppliers');
    }
}
