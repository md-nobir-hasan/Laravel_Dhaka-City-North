<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\words;
use App\Models\police_stations;
use App\Models\parlament_seat;
use Session;
Session_start();

class w_controler extends Controller
{
    function show()
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {
        
        $data_p = parlament_seat::all();

       $data_join = DB::table('words')
                    ->join('parlament_seat','words.P_id','=','parlament_seat.id')
                    ->join('police_stations','words.ps_id','=','police_stations.id')
                    ->select('words.*','police_stations.PS_name','parlament_seat.name','parlament_seat.no')
                   
                    ->get();
                    // dd($data_p);

        return view('add_word_info',compact('data_p','data_join'));
    }else{
   

        return redirect('/');
        }  

    }
    function ajax($id)
    {
       $data_join = DB::table('police_stations')
                    ->join('parlament_seat','police_stations.P_id','=','parlament_seat.id')
                    ->select('police_stations.id','police_stations.PS_name','parlament_seat.name','parlament_seat.no')
                    ->where('police_stations.P_id','=',$id)
                   
                    ->get();
                    // dd($data_p);

        return response()->json($data_join);

    }


    function insert(request $request)
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {


        $ps = words::where('ps_id', '=', $request->input('ps_id'))->first();

    
        $a = $request->p_id;
        $b = $request->ps_id;
        $c = $request->w_number;
        $combine = $a.$b.$c;
        $ps = words::all();

        $search='';

        foreach($ps as $data){
            
            $com = $data->p_id.$data->ps_id.$data->w_number;
            if($combine==$com){
                $search=$com;

            }
        }

        
        if($search==$combine){
            return redirect('/add_word_info')->with('message', '0');
        }
        else{
            $insert = new words;
            $insert->p_id = $request->p_id;
            $insert->ps_id= $request->ps_id;
            $insert->w_number= $request->w_number;
            $insert->save();
            return redirect('/add_word_info')->with('message', '1');
        }

    }else{
   

        return redirect('/');
        }  

        
       
    }




    public function update_page($id){
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {
        
        $data_p = parlament_seat::all();
        $data_ps = police_stations::all();
        $data_w = words::where ('id',$id)->first();
        return view('update_word_info',compact('data_p','data_ps','data_w'));
    }else{
   

        return redirect('/');
        }  
    }




    function update(request $request,$id){
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {
           $ps = words::where('ps_id', '=', $request->input('ps_id'))->first();

    
        $a = $request->p_id;
        $b = $request->ps_id;
        $c = $request->w_number;
        $combine = $a.$b.$c;
        $ps = words::all();
        foreach($ps as $data){
            $search='';
            $com = $data->p_id.$data->ps_id.$data->w_number;
            if($combine==$com){
                $search=$com;

            }else{
               
                
            }
        }
        if($search==$combine){
            return redirect('/add_word_info/'.$id)->with('message', '0');
        }
        else{
            $insert = words::find($id);
            $insert->p_id = $request->p_id;
            $insert->ps_id= $request->ps_id;
            $insert->w_number= $request->w_number;
            $insert->save();
            return redirect('/add_word_info')->with('message', '5');
        }
    }else{
   

        return redirect('/');
        }  

        
    }
}
