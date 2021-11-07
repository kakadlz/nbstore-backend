<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\products;
use Illuminate\Http\Request;

class apiproductscontroller extends Controller
{
    public function all(Request $request){
        $id=$request->input('id');
        $limit=$request->input('limit',6);
        $name=$request->input('name');
        $slug=$request->input('slug');
        $type=$request->input('type');
        $price_from=$request->input('price_from');
        $price_to=$request->input('price_to');

        if($id){
            $products=products::with('product_galleries')->find($id);

            if($products)
                return ResponseFormatter::success($products,'Data berhasil di ambil');
            else
                return ResponseFormatter::success(null,'Data tidak ditemukan',404);

        }


        if($slug){
            $products=products::with('product_galleries')->where('slug',$slug)->first();

            if($products)
                return ResponseFormatter::success($products,'Data berhasil di ambil');
            else
                return ResponseFormatter::success(null,'Data tidak ditemukan',404);

        }

        $products=products::with('product_galleries');


        if($name)
            $products=products::with('product_galleries')->where('name','like','%'.$name.'%')->first();


        if($type)
        $products=products::with('product_galleries')->where('type','like','%'.$type.'%')->first();


        if($price_from)
        $products=products::with('product_galleries')->where('price','>=',$price_from)->first();


        if($price_to)
        $products=products::with('product_galleries')->where('price','<=',$price_to)->first();

        return ResponseFormatter::success(
            $products->paginate($limit),
            'Data berhasil diambil'
        );
    }
}
