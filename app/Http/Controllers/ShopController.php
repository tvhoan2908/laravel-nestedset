<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ShopController extends Controller
{
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
