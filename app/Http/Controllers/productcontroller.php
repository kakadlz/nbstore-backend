<?php

namespace App\Http\Controllers;

use App\Http\Requests\productsrequest;
use App\Models\product;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function index(){
        $datas=product::all();
        return view('pages.products.index')->with(['datas'=>$datas]);

    }

    public function store(productsrequest $request){

    }

    public function show(product $id){
        $datas=product::all();
        return view('pages.products.index')->with(['datas'=>$datas]);

    }

    public function edit(product $id){
        $datas=product::all();
        return view('pages.products.index')->with(['datas'=>$datas]);

    }

    public function update(productsrequest $request,product $id){

    }

    public function destroy($id){

    }
}
