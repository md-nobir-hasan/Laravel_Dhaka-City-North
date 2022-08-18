<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\parlament_seat;
use App\Models\police_stations;
use Session;
Session_start();

class PS_controler extends Controller
{
    function show(){
        $admin_phone = Session::get('admin_phone');

        if($admin_phone){
        
        $data_p = parlament_seat::all();
       $data_ps = DB::table('police_stations')
                    ->join('parlament_seat','police_stations.P_id','=','parlament_seat.id')
                    ->select('police_stations.*','parlament_seat.name','parlament_seat.no')
                 
                    ->get();
        return view('Add_Police_Station',compact('data_p','data_ps'));
    }else{
   

        return redirect('/');
        }   

    }

    
    function insert(request $request){
        $admin_phone = Session::get('admin_phone');

        if($admin_phone){

        // $user = police_stations::where('PS_name', '=', $request->input('PS_name'))
        // ->where('no','=', $request->input('PS_name'))
        // ->first();
        $user = DB::table('police_stations')
        ->join('parlament_seat','police_stations.P_id','=','parlament_seat.id')
        ->select('police_stations.*','parlament_seat.name','parlament_seat.no')
        ->where('police_stations.P_id',$request->input('P_id'))
        ->where('PS_name', $request->input('PS_name'))
        ->first();

        if ($user ===null) { 
            $insert = new police_stations;
            $insert->PS_name = $request->PS_name;
            // echo $insert->PS_name;
            $insert->P_id= $request->P_id;
            $insert->save();
            return redirect('/Add_Police_Station')->with('message', '1');
        }else{
          return redirect('/Add_Police_Station')->with('message', '0');
        
        }
    }else{
   

        return redirect('/');
        }   
        
    }
    
    
    public function update_page($id){
        $admin_phone = Session::get('admin_phone');

        if($admin_phone){
        
        $data_p = parlament_seat::all();
        $data_ps = police_stations::where ('id',$id)->first();
        return view('update_page_ps',compact('data_p','data_ps'));
    }else{
   

        return redirect('/');
        }   
    }

    public function update(request $request,$id){
        $admin_phone = Session::get('admin_phone');

        if($admin_phone){
        $update = police_stations::where('id',$id)->first();

        $update->PS_name = $request->PS_name;
        $update->P_id= $request->P_id;
        $update->save();
        return redirect('/Add_Police_Station')->with('message', '1');
    }else{
   

        return redirect('/');
        }   
        
    }

    
}
