<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorehouseProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storehouse_products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('name', 45)->unique('name');
            $table->text('description')->nullable();
            //unit=unidade
            //box=caixa
            //mass=kilo
            //lenght=comprimento/metro
            $table->enum('unit', ['unit', 'kilogram', 'meter'])->default('unit');
            $table->float('current_inventory')->default(0);
            $table->float('minimum_inventory')->default(0);
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
        Schema::dropIfExists('storehouse_products');
    }
}
