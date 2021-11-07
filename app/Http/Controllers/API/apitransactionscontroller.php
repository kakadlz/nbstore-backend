<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\transactions;
use Illuminate\Http\Request;

class apitransactionscontroller extends Controller
{
    public function get(Request $request,$id){
        $product = transactions::with('details.products')->find($id);

        if($product)
            return ResponseFormatter::success($product,'Data berhasil diambil');
        else
            return ResponseFormatter::error(null,'Data tidak ditemukan',404);
    }
    // public function get(Request $request,$id){
    //     $product = transactions::with('details.products')->find($id);

    //     if($product)
    //         return ResponseFormatter::success($product,'Data berhasil diambil');
    //     else
    //         return ResponseFormatter::error(null,'Data tidak ditemukan',404);
    // }
}
