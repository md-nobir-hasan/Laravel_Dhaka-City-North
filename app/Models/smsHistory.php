<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\mpDetail;
use App\Models\unitRP;
use App\Models\word_rp;
use App\Models\policeStationResponsibleParson;
use App\Models\designation;
use App\Models\u_model;
use App\Models\words;
use App\Models\police_stations;
use App\Models\parlament_seat;

class smsHistory extends Model
{
    use HasFactory;

    public function user_data(){
        $phone_number = $this->receiver;
        $module = $this->module;

        $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
        $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        $phone_number = str_replace($en, $bn, $phone_number);

        if($module == 'unit'){
            $user = unitRP::where('rp_phone', $phone_number)->first();
            $rp_name = $user->rp_name ?? '';
            $d_id = $user->d_id ?? '';
            $u_id = $user->u_id ?? '';
            $w_id = $user->w_id ?? '';
            $ps_id = $user->ps_id ?? '';
            $p_id = $user->p_id ?? '';

            $rp_name = $user->rp_name ?? '';
            $designation = designation::find($d_id)->d_name ?? '';
            $unit = u_model::find($u_id)->union_name ?? '';
            $word = words::find($w_id)->w_number ?? '';
            $ps = police_stations::find($ps_id)->PS_name ?? '';
            $p_name = parlament_seat::find($p_id)->name ?? '';
            $p_no = parlament_seat::find($p_id)->no ?? '';

            $result = $phone_number.'<br>'. $rp_name.'<br>'.$designation.' | '.$unit.'<br>ওয়ার্ড - '.$word.' | '.$ps.' | '.$p_name.' - '.$p_no;
        }

        

        return $result;


    }

}
