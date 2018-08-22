<?php

use Eav\Attribute;
use Eav\EntityAttribute;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductEntityAttributes091113 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        			
			Attribute::add([
				'attribute_code' => 'sku',
				'entity_code' => 'product',
				'backend_class' => NULL,
				'backend_type' => '',
				'backend_table' =>  NULL,
				'frontend_class' =>  NULL,
				'frontend_type' => '',
				'frontend_label' => ucwords(str_replace('_',' ','sku')),
				'source_class' =>  NULL,
				'default_value' => '',
				'is_required' => 0,
				'required_validate_class' =>  NULL	
			]);
			
			Attribute::add([
				'attribute_code' => 'name',
				'entity_code' => 'product',
				'backend_class' => NULL,
				'backend_type' => '',
				'backend_table' =>  NULL,
				'frontend_class' =>  NULL,
				'frontend_type' => '',
				'frontend_label' => ucwords(str_replace('_',' ','name')),
				'source_class' =>  NULL,
				'default_value' => '',
				'is_required' => 0,
				'required_validate_class' =>  NULL	
			]);
			
			Attribute::add([
				'attribute_code' => 'search',
				'entity_code' => 'product',
				'backend_class' => NULL,
				'backend_type' => '',
				'backend_table' =>  NULL,
				'frontend_class' =>  NULL,
				'frontend_type' => '',
				'frontend_label' => ucwords(str_replace('_',' ','search')),
				'source_class' =>  NULL,
				'default_value' => '',
				'is_required' => 0,
				'required_validate_class' =>  NULL	
			]);
			
			Attribute::add([
				'attribute_code' => 'description',
				'entity_code' => 'product',
				'backend_class' => NULL,
				'backend_type' => '',
				'backend_table' =>  NULL,
				'frontend_class' =>  NULL,
				'frontend_type' => '',
				'frontend_label' => ucwords(str_replace('_',' ','description')),
				'source_class' =>  NULL,
				'default_value' => '',
				'is_required' => 0,
				'required_validate_class' =>  NULL	
			]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        			
			Attribute::remove([
				'attribute_code' => 'sku',
				'entity_code' => 'product',
			]);
			
			Attribute::remove([
				'attribute_code' => 'name',
				'entity_code' => 'product',
			]);
			
			Attribute::remove([
				'attribute_code' => 'search',
				'entity_code' => 'product',
			]);
			
			Attribute::remove([
				'attribute_code' => 'description',
				'entity_code' => 'product',
			]);

    }
}
