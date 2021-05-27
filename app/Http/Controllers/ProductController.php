<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;   #Query builder

class ProductController extends Controller
{
    public function all(){

//        $products= Product::all();  //select * from products; Eloquent
//        $products = Product::join('categories','products.category_id','categories.id')
//            ->select('products.id','products.name as product','products.price','categories.name as category')
//            ->orderBy('products.id')
//            ->get();
        $products = DB::table('products')  //query builder is faster than eloquent
                    ->join('categories','products.category_id','categories.id')
                    ->select('products.id','products.name as product','products.price','categories.name as category')
                    ->orderBy('products.id', 'asc')
                    ->get();
        return view('product.all',compact('products'));
    }
}
