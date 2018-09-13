<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ShopController@index');

Route::get('list', 'ShopController@getList');

Route::get('create', 'ShopController@create');

Route::get('edit/{id}', 'ShopController@edit');

Route::get('delete/{id}', 'ShopController@destroy');

Route::get('test', 'ShopController@test');

Route::get('create/attribute-set', 'ShopController@createAttributeSet');

Route::get('get/attribute-set', 'ShopController@getAttributeSet');

Route::get('get/attributes-from-attribute-set', 'ShopController@getAttributesFromAttributeSet');

Route::get('create/attribute-group', 'ShopController@createAttributeGroup');

Route::get('get/attribute-group-from-attrubute-set', 'ShopController@getAttributeGroupFromAttributeSet');

Route::get('get/attributes-from-attrubute-group', 'ShopController@getAttributeFromAttributeGroup');

Route::get('get/base-entity', 'ShopController@getBaseEntity');

Route::get('create/base-entity', 'ShopController@getBaseEntity');

Route::get('create/attribute', 'ShopController@createAttribute');

Route::get('create/size-attribute', 'ShopController@createSizeAttribute');

Route::get('get/attribute-from-entity', 'ShopController@getAttributesFromEntity');

Route::get('get/values', 'ShopController@getValues');

Route::get('create/size-attribute-value', 'ShopController@createSizeAttributeValue');

Route::get('create/product', 'ShopController@createProduct');
