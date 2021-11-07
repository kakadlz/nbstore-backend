<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\requestcheckout;
use App\Models\products;
use App\Models\transaction_details;
use App\Models\transactions;
use Illuminate\Http\Request;

class apicheckoutscontroller extends Controller
{
    public function checkout(Request $request){
        $data=$request->except('transaction_details');
        $data['uuid']='TRX' . mt_rand(100000,999999) . mt_rand(100,999);
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['number']=$request->number;
        $data['address']=$request->address;
        $data['transaction_total']=$request->transaction_total;
        $data['transaction_status']=$request->transaction_status;
        $data['transaction_details']=$request->transaction_details;
        // dd($data,$request->transaction_details);
        // $transaction='test';
        $transaction= transactions::create($data);
        if($request->transaction_details!=null){
        foreach($request->transaction_details as $product){
            // dd($product);
            $details[]= new transaction_details([
                'transactions_id' => $transaction->id,
                'products_id' => $product,
            ]);

            products::find($product)->decrement('quantity');
        }

        $transaction->details()->saveMany($details);
    }
        return ResponseFormatter::success($transaction);
    }
}
