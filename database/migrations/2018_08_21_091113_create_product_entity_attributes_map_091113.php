<?php

use Eav\Attribute;
use Eav\EntityAttribute;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductEntityAttributesMap091113 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        			
			EntityAttribute::map([
				'attribute_code' => 'sku',
				'entity_code' => 'product',
				'attribute_set' => 'Default',
				'attribute_group' => 'General'
			]);
			
			EntityAttribute::map([
				'attribute_code' => 'name',
				'entity_code' => 'product',
				'attribute_set' => 'Default',
				'attribute_group' => 'General'
			]);
			
			EntityAttribute::map([
				'attribute_code' => 'search',
				'entity_code' => 'product',
				'attribute_set' => 'Default',
				'attribute_group' => 'General'
			]);
			
			EntityAttribute::map([
				'attribute_code' => 'description',
				'entity_code' => 'product',
				'attribute_set' => 'Default',
				'attribute_group' => 'General'
			]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        			
			EntityAttribute::unmap([
				'attribute_code' => 'sku',
				'entity_code' => 'product',
			]);
			
			EntityAttribute::unmap([
				'attribute_code' => 'name',
				'entity_code' => 'product',
			]);
			
			EntityAttribute::unmap([
				'attribute_code' => 'search',
				'entity_code' => 'product',
			]);
			
			EntityAttribute::unmap([
				'attribute_code' => 'description',
				'entity_code' => 'product',
			]);

    }
}
