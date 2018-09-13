<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductIntTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_int', function (Blueprint $table) {
            $table->increments('value_id')->comment('Value ID');
            $table->smallInteger('entity_type_id')->unsigned()->default(0)->comment('Entity Type ID');
            $table->integer('attribute_id')->unsigned()->default(0)->comment('Attribute ID');
            $table->integer('entity_id')->unsigned()->default(0)->comment('Entity ID');
            
            $table->integer('value')->default(NULL)->nullable()->comment('Value');
            
            $table->foreign('entity_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');
            
            $table->unique(['entity_id','attribute_id']);
            $table->index('attribute_id');
            $table->index('entity_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_int');
    }
}
