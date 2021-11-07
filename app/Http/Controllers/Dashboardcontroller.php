<?php

namespace App\Http\Controllers;

use App\Models\transactions;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    public function index(){
        $income=transactions::where('transaction_status','SUCCESS')->sum('transaction_total');
        $sales=transactions::count();
        $datas=transactions::orderBy('id','desc')->take(5)->get();
        $pie=[
            'pending'=>transactions::where('transaction_status','PENDING')->count(),
            'failed'=>transactions::where('transaction_status','FAILED')->count(),
            'success'=>transactions::where('transaction_status','SUCCESS')->count(),
        ];
        return view('pages.dashboard')->with([
            'income'=>$income,
            'sales'=>$sales,
            'datas'=>$datas,
            'pie'=>$pie,
        ]);
    }
}
