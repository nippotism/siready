<?php

namespace App\Http\Controllers;

use App\Models\Khs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KhsController extends Controller
{
    public function all()
    {
    
        $data = Khs::select('semester',DB::raw('sum(sks) as sks'))->groupBy('semester')->get();
        return view('mhsKhs',compact('data'));
    }
    

    public function index(Request $request,$id)
    {
        $data = Khs::where('semester',$id)->get();

        if ($request->ajax()) {
            return response()->json($data);
        }
    }
}
