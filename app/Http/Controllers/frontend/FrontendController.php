<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Courierdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }


    public function checkStatus()
    {
        return view('frontend.check_status');
    }

    public function checkStatusResult(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '*' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error'=> $validator->errors()->toArray()
            ]);
        }else{
            $courierSummary = Courierdetail::where('tracking_id', $request->tracking_id)->first();
            $sender_branch = $courierSummary->branch->branch_name;
            $receiver_branch = $courierSummary->recbranch->branch_name;
            $payment_status = $courierSummary->payment_status;
            $courier_status = $courierSummary->status;
            return response()->json([
                'status' => 200,
                'sender_branch'=> $sender_branch,
                'receiver_branch'=> $receiver_branch,
                'payment_status'=> $payment_status,
                'courier_status'=> $courier_status,
            ]);
        }
    }
}
