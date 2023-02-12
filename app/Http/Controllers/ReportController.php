<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\transactionDetail;
use App\Models\transactionHeader;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.report');
    }
    
    public function print(Request $request)
    {
        if (!empty($request->date)) {
            $data = transactionHeader::with('details','details.product','usernya')->where('created_at','like', '%'.$request->date.'%')->get();
        }else{
            $data = transactionHeader::with('details','details.product','usernya')->get();
        }

        return view('report.print', compact('data'));
    }
}
