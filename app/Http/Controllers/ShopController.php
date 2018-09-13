<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Products;
use DB;
use Eav\Entity;

class ShopController extends Controller
{

    protected $entity;

    public function __construct()
    {
        $this->entity = Entity::findByCode('product');
    }

    public function createProduct()
    {
        Products::create([
            'name' => 'Test 1',
            'sku'  => '123456',
            'description' => 'Lorem ipsum dolor sit amet.',
            'search' =>'Lorem ipsum dolor sit amet.',
            'size' => 'L',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function createSizeAttributeValue()
    {
        $statusAttr = \Eav\Attribute::findByCode('size', 'product');

        \Eav\AttributeOption::add($statusAttr, [
            's' => 'Small',
            'm' => 'Medium',
            'l' => 'Large',
            'xl' => 'Xtra Large',
        ]);
    }

    public function createOptionAttributeValue()
    {
        $statusAttr = \Eav\Attribute::findByCode('size', 'product');

        \Eav\AttributeOption::add($statusAttr, [
            's' => 'Small',
            'm' => 'Medium',
            'l' => 'Large',
            'xl' => 'Xtra Large',
        ]);
    }

    public function getValues()
    {
        $product = Products::all(['attr.*']);

        dd($product);
    }

    public function getAttributesFromEntity()
    {
        $attributes = $this->entity->attributes;

        dd($attributes);
    }

    public function createSizeAttribute()
    {
        $attribute = \Eav\Attribute::add([
            'attribute_code' => 'size',
            'entity_code' => 'product',
            'backend_class' => null,
            'backend_type' => 'string',
            'backend_table' => null,
            'frontend_class' => null,
            'frontend_type' => 'input',
            'frontend_label' => 'Size',
            'source_class' => null,
            'default_value' => 0,
            'is_required' => 0,
            'is_filterable' => 0,
            'is_searchable' => 0,
            'required_validate_class' => null
        ]);

        $maps = \Eav\EntityAttribute::map([
            'attribute_code' => 'size',
            'entity_code' => 'product',
            'attribute_set' => 'Default',
            'attribute_group' => 'General'
        ]);
    }

    public function createAttribute()
    {
        $attribute = \Eav\Attribute::add([
            'attribute_code' => 'status',
            'entity_code' => 'product',
            'backend_class' => null,
            'backend_type' => 'integer',
            'backend_table' => null,
            'frontend_class' => null,
            'frontend_type' => 'select',
            'frontend_label' => 'Status',
            'source_class' => Eav\Attribute\Source\Boolean::class,
            'default_value' => 0,
            'is_required' => 0,
            'is_filterable' => 0,
            'is_searchable' => 0,
            'required_validate_class' => null
        ]);

        $maps = \Eav\EntityAttribute::map([
            'attribute_code' => 'status',
            'entity_code' => 'product',
            'attribute_set' => 'Default',
            'attribute_group' => 'General'
        ]);

        dd($attribute);
    }

    public function getBaseEntity()
    {
        $products = Products::find(1);

        dd($products->baseEntity());
    }

    public function getAttributeFromAttributeGroup()
    {
        $attributeSets = $this->entity->attributeSet;
        $attributeGroups = $attributeSets->first()->attributeGroup;

        dd($attributeGroups->first()->attributes);
    }

    public function getAttributeGroupFromAttributeSet()
    {
        $attributeSets = $this->entity->attributeSet;
        $attributeGroups = $attributeSets->first()->attributeGroup;

        dd($attributeGroups);
    }

    public function createAttributeGroup()
    {
        $attributeSet = Entity::findByCode('product')->attributeSet->first();
        $attributeGroups = \Eav\AttributeGroup::create([
            'attribute_group_name' => 'MetaData',
            'attribute_set_id' => $attributeSet->attribute_set_id
        ]);

        dd($attributeGroups);
    }

    public function getAttributesFromAttributeSet()
    {
        $entity = Entity::findByCode('product');
        $sets = $entity->attributeSet;

        dd($sets->first()->attributes);
    }

    public function getAttributeSet()
    {
        $entity = Entity::findByCode('product');
        $sets = $entity->attributeSet;

        dd($sets);
    }

    public function createAttributeSet()
    {
        $entity = Entity::findByCode('product');
        $attributeSet = \Eav\AttributeSet::create([
            'attribute_set_name' => 'kids_clothing',
            'entity_id' => $entity->entity_id
        ]);
        dd($attributeSet);
    }

    public function test()
    {
        // Attribute Set
        $entity = Entity::findByCode('product');
        /**
         * 
         */
        dd($entity->attributeSet->first()->attributes);
        $faker = \Faker\Factory::create();
        $categoryIds = [4,8,9,10,11,12,13,14,15,16,17,18,19,20];
        $vendorIds = [17,18];
        for($i=0;$i<=10;$i++){
            Products::create([
                'name' => $faker->name,
                'sku'  => $faker->postcode,
                'description' => $faker->realText,
                'search' => $faker->name,
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => Date('Y-m-d H:i:s'),
            ]);
        }
    }

    public function index()
    {
        $shops = Shop::get()->toTree();
        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
            foreach ($categories as $category) {
                echo '<div>'. PHP_EOL. $prefix . ' ' . $category->category_name . '</div>';

                $traverse($category->children, $prefix.'-');
            }
        };

        $traverse($shops);die();

        return view('shop', [
            'shops' => $shops
        ]);
    }

    public function create()
    {
        $node = new Shop;
        $node->category_name = 'Điện thoại Lenovo';
        $node->parent_id = 18;
        $node->save();

        $shops = Shop::get()->toTree();
        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
            foreach ($categories as $category) {
                echo '<div>'. PHP_EOL. $prefix . ' ' . $category->category_name . '</div>';

                $traverse($category->children, $prefix.'-');
            }
        };

        $traverse($shops);die();
    }

    public function getList()
    {
        $shops = Shop::with('ancestors')->get();
        $category = Shop::find(2)->getNextSiblings();
        dd($category);

        return view('list', ['shops' => $shops]);
    }

    public function edit($id)
    {
        $node = Shop::find($id);
        $node->parent_id = 17;
        $node->save();

        $shops = Shop::get()->toTree();
        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
            foreach ($categories as $category) {
                echo '<div>'. PHP_EOL. $prefix . ' ' . $category->category_name . '</div>';

                $traverse($category->children, $prefix.'-');
            }
        };

        $traverse($shops);
    }

    public function destroy($id)
    {
        $node = Shop::find($id);
        $node->delete();
    }
}
