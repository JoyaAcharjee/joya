<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function products(){
        $products = DB::table('products as p')
            ->join('categories as c','p.category_id','c.id')
            ->select('p.id','p.name as product','p.price','c.name as category')
            ->get();
        if ($products){
            $error=false;
            $msg='Data Retrieved';
        }
        else{
            $error = true;
            $msg = 'No Data Found';        }

        return response()->json([
            'data' => $products,
            'error' => $error,
            'msg' => $msg
        ]);
    }
    public function insert(Request $request){
        $obj = new Product();
        $obj->name = $request->productname;
        $obj->price = $request->productprice;
        $obj->details = $request->productdetails;
        $obj->category_id = $request->category_id;
        if ($obj->save()){
            return response()->json([
            'data' => $obj,
            'error' => false,
            'msg' => 'Successfully Inserted'
            ]);
        }
    }
    public function getProductById($id){
        $product = DB::table('products')
            ->where('id' ,'=',$id)
            ->first();
        if ($product){
            $msg = 'Data Found';
            $error = false;
        }
        else{
            $msg = 'Data Not Found';
            $error = true;
        }
        return response()->json([
            'products' => $product,
            'error' => $error,
            'msg' => $msg
        ]);
    }
    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->name= $request->name;
        $product->price= $request->price;
        $product->save();


    }
}
