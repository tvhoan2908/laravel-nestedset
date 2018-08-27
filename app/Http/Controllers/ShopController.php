<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ShopController extends Controller
{
    public function index()
    {
        // dd(Shop::get()->toFlatTree());
        $shops = Shop::orderBy('_lft', 'ASC')->get()->toTree();
        // dd($shops);
        /*$traverse = function ($categories, $prefix = '-') use (&$traverse) {
            foreach ($categories as $category) {
                echo '<div>'. PHP_EOL. $prefix . ' ' . $category->category_name . '</div>';

                $traverse($category->children, $prefix.'-');
            }
        };

        $traverse($shops);die();*/

        return view('shop', [
            'shops' => $shops
        ]);
    }

    public function create()
    {
        $json_string = '[{"category_name":"Marvel Comic Book","id":3,"children":[]},{"category_name":"Books","id":1,"children":[{"category_name":"Comic Book","id":2,"children":[{"category_name":"DC Comic Book","id":4,"children":[]},{"category_name":"Action comics","id":5,"children":[]},{"category_name":"Electronics","id":10,"children":[{"category_name":"TV","id":11,"children":[{"category_name":"LED","id":12,"children":[]},{"category_name":"Blu-ray","id":13,"children":[]}]},{"category_name":"Mobile","id":14,"children":[{"category_name":"Samsung","id":15,"children":[]},{"category_name":"iPhone","id":16,"children":[]},{"category_name":"Xiomi","id":17,"children":[]}]}]}]},{"category_name":"Textbooks","id":6,"children":[{"category_name":"Business","id":7,"children":[]},{"category_name":"Finance","id":8,"children":[]},{"category_name":"Computer Science","id":9,"children":[]}]}]}]';
        $json_array = json_decode($json_string, true);
        Shop::rebuildTree($json_array);
        // dd(json_decode($json_string, true));
        /*$node = new Shop;
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

        $traverse($shops);die();*/
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
