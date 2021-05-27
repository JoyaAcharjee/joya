<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ApiController extends Controller
{
   public function products()
   {
      $products = DB::table('products as p')
      ->join('categories as c', 'p.category_id', 'c.id')
      ->select('p.id','p.name','p.price','c.name as category')
      ->get();
      return response()->json([
            'products' => $products,
            'msg'=> 'Retrieved'
      ]);
   }
   public function categories(){
         $categories = DB::table('categories as c')
            ->select('c.id', 'c.name')
            ->get();
            return response()->json([
               'categories' => $categories,
               'msg' => 'Retrieved'
            ]);
   }
   public function create(Request $request)
   {
      $obj = new Product();
      $obj->name  = $request-> pname;
      $obj->price = $request-> pprice;
      $obj->category_id = $request-> pcategory;
      if ($obj-> save()){
         return response()->json([
            'date' => $obj,
            'msg' => 'Successfully inserted'
         ]);
      }
   }
}
