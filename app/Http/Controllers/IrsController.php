<?php

namespace App\Http\Controllers;


use App\Models\Irs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IrsController extends Controller
{

    public function all()
    {
    
        $data = Irs::select('semester',DB::raw('sum(sks) as sks'))->groupBy('semester')->get();
        return view('mhsIrs',compact('data'));
    }
    

    public function index(Request $request,$id)
    {
        $data = Irs::where('semester',$id)->get();

        if ($request->ajax()) {
            return response()->json($data);
        }
    }
}
