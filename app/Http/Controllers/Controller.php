<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\smsHistory;
use App\Models\User;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendSms($mobile,$text,$masking=false)
    {
        if($masking == true){
            $senderid= 'European IT';
        }else{
            $senderid= '8809601000500';
        }

        $url = 'http://users.sendsmsbd.com/smsapi';
        $fields = array(
            'api_key' => urlencode('C2004644606ace59057584.63934821'),
            'type' => urlencode('text'),
            'contacts' => urlencode($mobile),
            'senderid' => $senderid,
            'msg' => $text
        );
        $fields_string='';
        foreach($fields as $key=>$value){
            $fields_string .= $key.'='.$value.'&';
        }
        rtrim($fields_string, '&');
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);

        if (strpos($result, 'SMS SUBMITTED: ID') !== false) {
            return true;
        } elseif ($result == '1002') {
            return "Sender Id/Masking Not Found";
        } elseif ($result == '1003') {
            return "API Not Found";
        } elseif ($result == '1004') {
            return "SPAM Detected";
        } elseif ($result == '1005' || $result == '1006') {
            return "Internal Error";
        } elseif ($result == '1007') {
            return "Balance Insufficient";
        } elseif ($result == '1008') {
            return "Message is empty";
        } elseif ($result == '1009') {
            return "Message Type Not Set (text/unicode)";
        } elseif ($result == '1010') {
            return "Invalid User & Password";
        } elseif ($result == '1011') {
            return "Invalid User Id";
        } elseif ($result == '1012') {
            return "Invalid Number Found";
        } elseif ($result == '1013') {
            return "API limit error";
        } elseif ($result == '1014') {
            return "No matching template";
        } elseif ($result == '1015') {
            return "SMS Content Validation Fails";
        }
        return "Something went wrong :(";
    }

    public function number_convert($number){

        $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
        $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        return str_replace($bn, $en, $number);
    }

    public function sms_history($type, $message, $receiver, $sender, $status){
        $admin_id = Session::get('admin_id');
        
        $save = new smsHistory;
        $save->type = $type;
        $save->message = $message;
        $save->receiver = $receiver;
        $save->sender = $sender;
        $save->added_by = $admin_id??'0';
        $save->status = $status;
        $save->save();

    }
}
