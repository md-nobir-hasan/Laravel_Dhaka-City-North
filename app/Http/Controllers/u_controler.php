<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\words;
use App\Models\police_stations;
use App\Models\parlament_seat;
use App\Models\u_model;
use Session;
Session_start();

class u_controler extends Controller
{

    function show()
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {
        
            $data_p = parlament_seat::orderBy('no')->get();
            $data_join = DB::table('units')
                    ->join('parlament_seat','units.p_id','=','parlament_seat.id')
                    ->join('police_stations','units.ps_id','=','police_stations.id')
                    ->join('words','units.w_id','=','words.id')
                    ->select('units.*','words.w_number','police_stations.PS_name','parlament_seat.name','parlament_seat.no')
                    ->orderBy('parlament_seat.no')
                    ->get();
                    // dd($data_p);

            return view('add_unit_info',compact('data_p','data_join'));
               
         }else{
   
        return redirect('/');
        }   

    }



    function ajax($p_id,$ps_id)
    {
        if($ps_id=='সকল'){
            $data_join = DB::table('words')
            ->join('parlament_seat','words.p_id','=','parlament_seat.id')
            ->join('police_stations','words.ps_id','=','police_stations.id')
            ->select('words.id','words.w_number','police_stations.PS_name')
            ->where('words.p_id','=',$p_id)
            ->get();
            // dd($data_p);

            return response()->json($data_join);

        }
        else{
            $data_join = DB::table('words')
            ->join('police_stations','words.ps_id','=','police_stations.id')
            ->select('words.id','words.w_number','police_stations.PS_name')
            ->where('words.p_id','=',$p_id)
            ->where('words.ps_id','=',$ps_id)
          
            ->get();
            // dd($data_p);

            return response()->json($data_join);
        }
      

    }



    function insert(request $request)
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {

            
             request()->validate([
                'p_id' => 'required',
                'ps_id' => 'required',
                'w_id' => 'required',
                'union_name' => 'required'
                ],
                [
                'p_id.required' => 'অনুগ্রহ করে আসন বাছাই করুন',
                'ps_id.required' => 'অনুগ্রহ করে থানা কমিটি বাছাই করুন',
                'w_id.required' => 'অনুগ্রহ করে ওয়ার্ড কমিটি বাছাই করুন',
                'union_name.required' => 'অনুগ্রহ করে ইউনিট কমিটি পূরন করুন'
               
                ]);

            $a = $request->p_id;
            $b = $request->ps_id;
            $c = $request->w_id;
            $d = $request->union_name;
            $combine = $a.$b.$c.$d;
            $ps = u_model::all();
            $search='';
            foreach($ps as $data){
                
                $com = $data->p_id.$data->ps_id.$data->w_id.$data->union_name;
                if($combine==$com){
                    $search=$com;

                }
            }
            if($search==$combine){
                return redirect('/add_unit_info')->with('message', '0');
            }
            else{
                $insert = new u_model;
                $insert->p_id = $request->p_id;
                $insert->ps_id= $request->ps_id;
                $insert->w_id= $request->w_id;
                $insert->union_name= $request->union_name;
                $insert->save();
                return redirect('/add_unit_info')->with('message', '1');
            }
        
               
        }else{
   
        return redirect('/');
        }   
        

    }




    public function update_page($id)
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {
        
        $data_p =parlament_seat::orderBy('no')->get();
        $data_u = u_model::where ('id',$id)->first();
        return view('update_unit_info',compact('data_p','data_u'));
               
         }else{
   
        return redirect('/');
        }   
    }


    




    function update(request $request,$id)
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {
        

            request()->validate([
                'p_id' => 'required',
                'ps_id' => 'required',
                'w_id' => 'required',
                'union_name' => 'required'
                ],
                [
                'p_id.required' => 'অনুগ্রহ করে আসন বাছাই করুন',
                'ps_id.required' => 'অনুগ্রহ করে থানা কমিটি বাছাই করুন',
                'w_id.required' => 'অনুগ্রহ করে ওয়ার্ড কমিটি বাছাই করুন',
                'union_name.required' => 'অনুগ্রহ করে ইউনিট কমিটি পূরন করুন'
               
                ]);

         
        $a = $request->p_id;
        $b = $request->ps_id;
        $c = $request->w_id;
        $d = $request->union_name;
        $combine = $a.$b.$c.$d;
        $ps = u_model::all();
        foreach($ps as $data){
            $search='';
            $com = $data->p_id.$data->ps_id.$data->w_id.$data->union_name;
            if($combine==$com){
                $search=$com;

            }
        }
        if($search==$combine)
        {
            return redirect('/update_page_unit/'.$id)->with('message', '0');
       }
        else{
            $insert = u_model::find($id);
            $insert->p_id = $request->p_id;
            $insert->ps_id= $request->ps_id;
            $insert->w_id= $request->w_id;
            $insert->union_name= $request->union_name;
            $insert->save();
            return redirect('/add_unit_info')->with('message', '5');
        }

               
    }
        else{
    
            return redirect('/');
            }   
        
    }
    

   
}
