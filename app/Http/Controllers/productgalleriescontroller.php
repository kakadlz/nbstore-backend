<?php

namespace App\Http\Controllers;

use App\Models\product_galleries;
use App\Models\products;
use Illuminate\Http\Request;

class productgalleriescontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $items = product_galleries::with('products')->get();
        // dd($items);
        return view('pages.productsgalleries.index')->with(['items'=>$items]);
    }
    public function create(){
        $products = products::all();
        return view('pages.productsgalleries.create')->with(['products'=>$products]);
    }
    public function store(Request $request){
        $data = $request->all();
        $data['photo'] =  $request->file('photo')->store('assets/product','public');
        product_galleries::create($data);
        return redirect()->route('productgalleries');
    }
    public function destroy($id){

        $item=product_galleries::findOrFail($id);
        $item->delete();

        return redirect()->route('productgalleries');
    }
}
