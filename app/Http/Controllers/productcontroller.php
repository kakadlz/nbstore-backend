<?php

namespace App\Http\Controllers;

use App\Http\Requests\productsrequest;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class productcontroller extends Controller
{
    public function index(){
        $datas=product::all();
        return view('pages.products.index')->with(['datas'=>$datas]);

    }


    public function create(){
        return view('pages.products.create');

    }

    public function store(productsrequest $request){
        $data=$request->all();
        $data['slug']=Str::slug($request->name);
        product::create($data);
        // dd($data);
        return redirect()->route('products');
    }

    public function show(product $id){
        $datas=product::all();
        return view('pages.products.index')->with(['datas'=>$datas]);

    }

    public function edit($id){
        // dd($id);
        $data=product::findOrFail($id);
        return view('pages.products.edit')->with(['data'=>$data]);
    }

    public function update(productsrequest $request, $id){
        $data=$request->all();
        $data['slug']=Str::slug($request->name);

        $item=product::findOrFail($id);
        $item->update($data);

        return redirect()->route('products');

    }

    public function destroy($id){

        $item=product::findOrFail($id);
        $item->delete();

        return redirect()->route('products');
    }
}
