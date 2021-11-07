<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\transaction_details;
use Illuminate\Http\Request;

class transactioncontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $datas=transaction::all();
        return view('pages.transactions.index')->with(['datas'=>$datas]);

    }


    public function create(){
        return view('pages.products.create');

    }

    public function store(productsrequest $request){
        $data=$request->all();
        $data['slug']=Str::slug($request->name);
        products::create($data);
        // dd($data);
        return redirect()->route('products');
    }

    public function show(products $id){
        $datas=products::all();
        return view('pages.products.index')->with(['datas'=>$datas]);

    }

    public function edit($id){
        // dd($id);
        $data=products::findOrFail($id);
        return view('pages.products.edit')->with(['data'=>$data]);
    }

    public function update(productsrequest $request, $id){
        $data=$request->all();
        $data['slug']=Str::slug($request->name);

        $item=products::findOrFail($id);
        $item->update($data);

        return redirect()->route('products');

    }

    public function destroy($id){

        $item=products::findOrFail($id);
        $item->delete();

        product_galleries::where('product_id',$id)->delete();
        return redirect()->route('products');
    }
}
