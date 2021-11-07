<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\transactions;
use App\Models\transaction_details;
use Illuminate\Http\Request;

class transactioncontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $datas=transactions::all();
        return view('pages.transactions.index')->with(['datas'=>$datas]);

    }


    public function create(){
        // return view('pages.products.create');

    }

    public function store(products $id,request $request){
        // $data=$request->all();
        // $data['slug']=Str::slug($request->name);
        // products::create($data);
        // // dd($data);
        // return redirect()->route('products');
    }

    public function show($id){
        $datas=transactions::with('details.products')->findOrFail($id);
        // dd($datas);
        return view('pages.transactions.show')->with(['datas'=>$datas]);

    }

    public function edit($id){
        // dd($id);
        $data=transactions::findOrFail($id);
        return view('pages.transactions.edit')->with(['data'=>$data]);
    }

    public function update($id,request $request){
        $data=$request->all();

        $item=transactions::findOrFail($id);
        $item->update($data);

        return redirect()->route('transactions.index');

    }

    public function destroy($id){

        $item=transactions::findOrFail($id);
        $item->delete();

        return redirect()->route('transactions.index');
    }
    public function setStatus(Request $request,$id){
        $request->validate([
            'status' => 'required|in:PENDING,SUCCESS,FAILED'
        ]);

        $data=transactions::findOrFail($id);
        $data->transaction_status=$request->status;

        $data->save();

        return redirect()->route('transactions.index');
    }
}
