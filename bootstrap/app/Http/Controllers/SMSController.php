<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\mpDetail;
use Illuminate\Support\Facades\Auth;
use Session;
Session_start();

class SMSController extends Controller
{
    public function index(){
        $mp_details = mpDetail::with('parlament_seat')->get();
        return view('sms.mp_sms', compact('mp_details'));
    }

    public function send_sms(Request $request){
        $request->validate([
            'number' => 'required',
            'message' =>'required|string'
        ]);

        $message = $request->message;
        $masking = false;

        foreach($request->number as $numbers){
            $result = $this->sendSms($numbers, $message, $masking);
        }

        return $result;
    }


}
