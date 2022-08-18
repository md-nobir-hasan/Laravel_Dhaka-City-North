<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\parlament_seat;
use App\Models\police_stations;
use App\Models\words;
use App\Models\u_model;
use App\Models\designation;
use App\Models\policeStationResponsibleParson;
use App\Models\word_rp;
use App\Models\unitRP;
use App\Models\mpDetail;

class displayInfo extends Controller
{

    public function thana()
    {
        $data_p = parlament_seat::all();
        $data_d = designation::all();
        $data_thana = DB::table('police_station_responsible_parsons')
                    ->join('parlament_seat','police_station_responsible_parsons.p_id','=','parlament_seat.id')
                    ->join('police_stations','police_station_responsible_parsons.ps_id','=','police_stations.id')
                    ->join('designation','police_station_responsible_parsons.d_id','=','designation.id')
                    ->select('police_station_responsible_parsons.*')
                    ->get();

        return view('display_Thana_rp_info',compact('data_thana','data_p','data_d'));
    }


    public function show_thana_report(request $request)
    {
        
        $request->p_id;
        $request->ps_id;
        $data_p = parlament_seat::all();
        
        if($request->ps_id!='*'){

            $data_unit = DB::table('police_station_responsible_parsons')
            ->join('parlament_seat','police_station_responsible_parsons.p_id','=','parlament_seat.id')
            ->join('police_stations','police_station_responsible_parsons.ps_id','=','police_stations.id')
            ->join('designation','police_station_responsible_parsons.d_id','=','designation.id')
            ->select('police_station_responsible_parsons.*','police_stations.*','designation.*')
            ->where('police_station_responsible_parsons.p_id','=',"$request->p_id")
            ->where('police_station_responsible_parsons.ps_id','=',"$request->ps_id")
            ->where('designation.d_name','=',"সভাপতি")
            ->orderBy('police_station_responsible_parsons.p_id')
            ->get();

            $data_unit2 = DB::table('police_station_responsible_parsons')
            ->join('parlament_seat','police_station_responsible_parsons.p_id','=','parlament_seat.id')
            ->join('police_stations','police_station_responsible_parsons.ps_id','=','police_stations.id')
            ->join('designation','police_station_responsible_parsons.d_id','=','designation.id')
            ->select('police_station_responsible_parsons.*','police_stations.*','designation.*')
            ->where('police_station_responsible_parsons.p_id','=',"$request->p_id")
            ->where('police_station_responsible_parsons.ps_id','=',"$request->ps_id")
            ->where('designation.d_name','=',"সাধারণ সম্পাদক")
            ->orderBy('police_station_responsible_parsons.p_id')
            ->get();
            // dd($data_unit);
            

            return view('/display_Thana_rp_info',compact('data_unit',"data_p","data_unit2"));
           
        }else{
           

            $data_unit = DB::table('police_station_responsible_parsons')
            ->join('parlament_seat','police_station_responsible_parsons.p_id','=','parlament_seat.id')
            ->join('police_stations','police_station_responsible_parsons.ps_id','=','police_stations.id')
            ->join('designation','police_station_responsible_parsons.d_id','=','designation.id')
            ->select('police_station_responsible_parsons.*','police_stations.*','designation.*')
            ->where('police_station_responsible_parsons.p_id','=',"$request->p_id")
            ->where('designation.d_name','=',"সভাপতি")
            ->orderBy('police_station_responsible_parsons.p_id')
            ->get();

            $data_unit2 = DB::table('police_station_responsible_parsons')
            ->join('parlament_seat','police_station_responsible_parsons.p_id','=','parlament_seat.id')
            ->join('police_stations','police_station_responsible_parsons.ps_id','=','police_stations.id')
            ->join('designation','police_station_responsible_parsons.d_id','=','designation.id')
            ->select('police_station_responsible_parsons.*','police_stations.*','designation.*')
            ->where('police_station_responsible_parsons.p_id','=',"$request->p_id")
            ->where('designation.d_name','=',"সাধারণ সম্পাদক")
            ->orderBy('police_station_responsible_parsons.p_id')
            ->get();

            // dd($data_unit);
           
            return view('/display_Thana_rp_info',compact('data_unit',"data_p","data_unit2"));
        }
   }



    public function word(){
        $data_p = parlament_seat::all();
        $data_word = DB::table('word_rps')
        ->join('parlament_seat','word_rps.p_id','=','parlament_seat.id')
        ->join('police_stations','word_rps.ps_id','=','police_stations.id')
        ->join('designation','word_rps.d_id','=','designation.id')
        ->join('words','word_rps.w_id','=','words.id')
        ->select('word_rps.*')
        ->get();
        return view('/display_word_rp_info',compact('data_word','data_p'));
    }



    public function show_word_report(request $request)
    {
        
        $request->p_id;
        $request->ps_id;
        $request->w_id;
       
        $data_p = parlament_seat::all();

        if($request->w_id!='*'){

            $data_unit = DB::table('word_rps')
            ->join('parlament_seat','word_rps.p_id','=','parlament_seat.id')
            ->join('police_stations','word_rps.ps_id','=','police_stations.id')
            ->join('designation','word_rps.d_id','=','designation.id')
            ->join('words','word_rps.w_id','=','words.id')
            ->select('word_rps.*','police_stations.*','designation.*','words.*')
            ->where('word_rps.p_id','=',"$request->p_id")
            ->where('word_rps.ps_id','=',"$request->ps_id")
            ->where('word_rps.w_id','=',"$request->w_id")
            ->where('word_rps.u_id','=',"$request->union_name")
            ->where('designation.d_name','=',"সভাপতি")
            ->orderBy('word_rps.w_id')
            ->get();

            $data_unit2 = DB::table('unit_r_p_s')
            ->join('parlament_seat','unit_r_p_s.p_id','=','parlament_seat.id')
            ->join('police_stations','unit_r_p_s.ps_id','=','police_stations.id')
            ->join('designation','unit_r_p_s.d_id','=','designation.id')
            ->join('words','unit_r_p_s.w_id','=','words.id')
            ->join('units','unit_r_p_s.u_id','=','units.id')
            ->select('unit_r_p_s.*','police_stations.*','designation.*','units.*')
            ->where('unit_r_p_s.p_id','=',"$request->p_id")
            ->where('unit_r_p_s.ps_id','=',"$request->ps_id")
            ->where('unit_r_p_s.w_id','=',"$request->w_id")
            ->where('unit_r_p_s.u_id','=',"$request->union_name")
            ->where('designation.d_name','=',"সাধারণ সম্পাদক")
            ->orderBy('unit_r_p_s.u_id')
            ->get();
            
            // dd($data_unit_president);
;
            return view('/display_unit_rp_info',compact('data_unit',"data_p","data_unit2"));
           
        }else{
           

            $data_unit = DB::table('unit_r_p_s')
            ->join('parlament_seat','unit_r_p_s.p_id','=','parlament_seat.id')
            ->join('police_stations','unit_r_p_s.ps_id','=','police_stations.id')
            ->join('designation','unit_r_p_s.d_id','=','designation.id')
            ->join('words','unit_r_p_s.w_id','=','words.id')
            ->join('units','unit_r_p_s.u_id','=','units.id')
            ->select('unit_r_p_s.*','police_stations.*','designation.*','units.*')
            ->where('unit_r_p_s.p_id','=',"$request->p_id")
            ->where('unit_r_p_s.ps_id','=',"$request->ps_id")
            ->where('unit_r_p_s.w_id','=',"$request->w_id")
            ->where('designation.d_name','=',"সভাপতি")
            ->orderBy('unit_r_p_s.u_id')
            ->get();

            $data_unit2 = DB::table('unit_r_p_s')
            ->join('parlament_seat','unit_r_p_s.p_id','=','parlament_seat.id')
            ->join('police_stations','unit_r_p_s.ps_id','=','police_stations.id')
            ->join('designation','unit_r_p_s.d_id','=','designation.id')
            ->join('words','unit_r_p_s.w_id','=','words.id')
            ->join('units','unit_r_p_s.u_id','=','units.id')
            ->select('unit_r_p_s.*','police_stations.*','designation.*','units.*')
            ->where('unit_r_p_s.p_id','=',"$request->p_id")
            ->where('unit_r_p_s.ps_id','=',"$request->ps_id")
            ->where('unit_r_p_s.w_id','=',"$request->w_id")
            ->where('designation.d_name','=',"সাধারণ সম্পাদক")
            ->orderBy('unit_r_p_s.u_id')
            ->get();
            
            // dd($data_unit);
           
            return view('/display_unit_rp_info',compact('data_unit',"data_p","data_unit2"));
        }
   }










    public function unit(){

        $data_p = parlament_seat::all();
        // $data_d = designation::all();
        // $data_unit =  DB::table('unit_r_p_s')
        // ->join('parlament_seat','unit_r_p_s.p_id','=','parlament_seat.id')
        // ->join('police_stations','unit_r_p_s.ps_id','=','police_stations.id')
        // ->join('designation','unit_r_p_s.d_id','=','designation.id')
        // ->join('words','unit_r_p_s.w_id','=','words.id')
        // ->join('units','unit_r_p_s.u_id','=','units.id')
        // ->select('unit_r_p_s.*','police_stations.*','designation.*','units.*')
        // ->where('designation.d_name','=',"সভাপতি")
        // ->orderBy('unit_r_p_s.u_id')
        // ->get();
        // $data_unit2 =  DB::table('unit_r_p_s')
        // ->join('parlament_seat','unit_r_p_s.p_id','=','parlament_seat.id')
        // ->join('police_stations','unit_r_p_s.ps_id','=','police_stations.id')
        // ->join('designation','unit_r_p_s.d_id','=','designation.id')
        // ->join('words','unit_r_p_s.w_id','=','words.id')
        // ->join('units','unit_r_p_s.u_id','=','units.id')
        // ->select('unit_r_p_s.*','police_stations.*','designation.*','units.*')
        // ->where('designation.d_name','=',"সাধারণ সম্পাদক")
        // ->orderBy('unit_r_p_s.u_id')
        // ->get();
    
    // dd($array6[0],$array3,$array12,$array9);

        return view('/display_unit_rp_info',compact('data_p'));
    }


    public function show_unit_report(request $request)
    {
        
        $request->p_id;
        $request->ps_id;
        $request->w_id;
        $request->union_name;
        $data_p = parlament_seat::all();
        if($request->union_name!='*'){

            $data_unit = DB::table('unit_r_p_s')
            ->join('parlament_seat','unit_r_p_s.p_id','=','parlament_seat.id')
            ->join('police_stations','unit_r_p_s.ps_id','=','police_stations.id')
            ->join('designation','unit_r_p_s.d_id','=','designation.id')
            ->join('words','unit_r_p_s.w_id','=','words.id')
            ->join('units','unit_r_p_s.u_id','=','units.id')
            ->select('unit_r_p_s.*','police_stations.*','designation.*','units.*')
            ->where('unit_r_p_s.p_id','=',"$request->p_id")
            ->where('unit_r_p_s.ps_id','=',"$request->ps_id")
            ->where('unit_r_p_s.w_id','=',"$request->w_id")
            ->where('unit_r_p_s.u_id','=',"$request->union_name")
            ->where('designation.d_name','=',"সভাপতি")
            ->orderBy('unit_r_p_s.u_id')
            ->get();

            $data_unit2 = DB::table('unit_r_p_s')
            ->join('parlament_seat','unit_r_p_s.p_id','=','parlament_seat.id')
            ->join('police_stations','unit_r_p_s.ps_id','=','police_stations.id')
            ->join('designation','unit_r_p_s.d_id','=','designation.id')
            ->join('words','unit_r_p_s.w_id','=','words.id')
            ->join('units','unit_r_p_s.u_id','=','units.id')
            ->select('unit_r_p_s.*','police_stations.*','designation.*','units.*')
            ->where('unit_r_p_s.p_id','=',"$request->p_id")
            ->where('unit_r_p_s.ps_id','=',"$request->ps_id")
            ->where('unit_r_p_s.w_id','=',"$request->w_id")
            ->where('unit_r_p_s.u_id','=',"$request->union_name")
            ->where('designation.d_name','=',"সাধারণ সম্পাদক")
            ->orderBy('unit_r_p_s.u_id')
            ->get();
            
            // dd($data_unit_president);
;
            return view('/display_unit_rp_info',compact('data_unit',"data_p","data_unit2"));
           
        }else{
           

            $data_unit = DB::table('unit_r_p_s')
            ->join('parlament_seat','unit_r_p_s.p_id','=','parlament_seat.id')
            ->join('police_stations','unit_r_p_s.ps_id','=','police_stations.id')
            ->join('designation','unit_r_p_s.d_id','=','designation.id')
            ->join('words','unit_r_p_s.w_id','=','words.id')
            ->join('units','unit_r_p_s.u_id','=','units.id')
            ->select('unit_r_p_s.*','police_stations.*','designation.*','units.*')
            ->where('unit_r_p_s.p_id','=',"$request->p_id")
            ->where('unit_r_p_s.ps_id','=',"$request->ps_id")
            ->where('unit_r_p_s.w_id','=',"$request->w_id")
            ->where('designation.d_name','=',"সভাপতি")
            ->orderBy('unit_r_p_s.u_id')
            ->get();

            $data_unit2 = DB::table('unit_r_p_s')
            ->join('parlament_seat','unit_r_p_s.p_id','=','parlament_seat.id')
            ->join('police_stations','unit_r_p_s.ps_id','=','police_stations.id')
            ->join('designation','unit_r_p_s.d_id','=','designation.id')
            ->join('words','unit_r_p_s.w_id','=','words.id')
            ->join('units','unit_r_p_s.u_id','=','units.id')
            ->select('unit_r_p_s.*','police_stations.*','designation.*','units.*')
            ->where('unit_r_p_s.p_id','=',"$request->p_id")
            ->where('unit_r_p_s.ps_id','=',"$request->ps_id")
            ->where('unit_r_p_s.w_id','=',"$request->w_id")
            ->where('designation.d_name','=',"সাধারণ সম্পাদক")
            ->orderBy('unit_r_p_s.u_id')
            ->get();

            // dd($data_unit);
           
            return view('/display_unit_rp_info',compact('data_unit',"data_p","data_unit2"));
        }
   }



    public  function mp(){
        $data_p = parlament_seat::all();
        $data_mp = DB::table('mp_details')
        ->join('parlament_seat','mp_details.p_id','=','parlament_seat.id')
        ->select('mp_details.*')
        ->get();

return view('/display_mp',compact('data_mp','data_p'));
    }



    public  function show_mp_report(Request $request){
        $data_p = parlament_seat::all();
        $data_mp = DB::table('mp_details')
                    ->join('parlament_seat','mp_details.p_id','=','parlament_seat.id')
                    ->select('mp_details.*')
                    ->where('mp_details.p_id','=',"$request->p_id") 
                    ->get();

        return view('/display_mp',compact('data_mp','data_p'));
   
    }
    

}
