<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\words;
use App\Models\police_stations;
use App\Models\parlament_seat;
use App\Models\policeStationResponsibleParson;
use App\Models\designation;
use App\Models\word_rp;
use Session;
Session_start();



class word_rp_controler extends Controller
{

    function show()
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {
        
        $data_p = parlament_seat::all();
        $data_designation = designation::all();

       $data_join = DB::table('word_rps')
                    ->join('parlament_seat','word_rps.p_id','=','parlament_seat.id')
                    ->join('police_stations','word_rps.ps_id','=','police_stations.id')
                    ->join('words','word_rps.w_id','=','words.id')
                    ->join('designation','word_rps.d_id','=','designation.id')
                    ->select('word_rps.*','police_stations.PS_name','parlament_seat.name','parlament_seat.no','designation.d_name','words.w_number')
                   
                    ->get();
        return view('word_rp_info',compact('data_p','data_join','data_designation'));
    }else{
   

        return redirect('/');
        }  

    }



    function insert(request $request)
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {

        $a = $request->p_id;
        $b = $request->ps_id;
        $c = $request->d_id;
        $d = $request->w_id;
        $e = $request->rp_nid;
        $f = $request->rp_phone;
        $combine = $a.$b.$c.$d;
        $ps = word_rp::all();
        $search='';
        foreach($ps as $data){
           
            $com = $data->p_id.$data->ps_id.$data->d_id.$data->w_id;
          
            
            if($combine==$com){
                
                $search=$com;

            }else{
               
                
            }
        }
        if($search==$combine){
            return redirect('/show_word_rp_info')->with('message', '0');
        }
        else{
            foreach($ps as $data){
                $search='';
                
                
                $com = "0";
                if($data->rp_nid==$e ||$data->rp_phone ==$f){
                    $search=$com;
                   
    
                }else{
                   
                   
                }
            }
            if($search=='0'){
                return redirect('/show_word_rp_info')->with('message', '0');
            }
            else{
                $insert = new word_rp;
                $insert->p_id = $request->p_id;
                $insert->ps_id = $request->ps_id;
                $insert->w_id = $request->w_id;
                $insert->d_id = $request->d_id;
                $insert->rp_name= $request->rp_name;
                $insert->rp_phone= $request->rp_phone;
                $insert->rp_nid= $request->rp_nid;

                $insert->rp_email= $request->rp_email;
                $insert->rp_dob= $request->rp_dob;

                if($request->hasFile('rp_img')){
                    $img = $request->file('rp_img');
                    $img_name = time().'.'.$img->getClientOriginalExtension();
                    $img->move('storage/image',$img_name);
                    $insert['rp_img']=$img_name;
                }


                $insert->save();
                return redirect('/show_word_rp_info')->with('message', '1');
            }
            
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
        
        $data_p = parlament_seat::all();
        $data_designation = designation::all();
        $data_word_rp = word_rp::where ('id',$id)->first();

        return view('update_word_rp_info',compact('data_p','data_designation','data_word_rp'));
    }else{
   

        return redirect('/');
        }  
    }





    function update(request $request,$id)
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {

        $a = $request->p_id;
        $b = $request->ps_id;
        $c = $request->d_id;
        $d = $request->w_id;
        $e = $request->rp_nid;
        $f = $request->rp_phone;
        // $combine = $a.$b.$c.$d;
        $ps = word_rp::all();
        // foreach($ps as $data){
        //     $search='';
        //     $com = $data->p_id.$data->ps_id.$data->d_id.$data->w_id;
          
            
        //     if($combine==$com){
                
        //         $search=$com;

        //     }else{
               
                
        //     }
        // }
        // if($search==$combine)
        // {
        //     return redirect('/update_page_word_rp/'.$id)->with('message', '0');
        // }
        // else{
            $search='';
            foreach($ps as $data){
                
                
                
                $com = "0";
                if($data->rp_nid==$e ||$data->rp_phone ==$f){
                    $search=$com;
                   
    
                }
            if($search=='0'){
                return redirect('/update_page_word_rp/'.$id)->with('message', '0');
            }
            else{
                $update = word_rp::find($id);
                $update->p_id = $request->p_id;
                $update->ps_id = $request->ps_id;
                $update->w_id = $request->w_id;
                $update->d_id = $request->d_id;
                $update->rp_name= $request->rp_name;
                $update->rp_phone= $request->rp_phone;
                $update->rp_nid= $request->rp_nid;


                $update->rp_email= $request->rp_email;
                $update->rp_dob= $request->rp_dob;

              

                if($request->hasFile('rp_img'))
                {
                    unlink("storage/image/$update->rp_img");

                    $img = $request->file('rp_img');
                    $img_name = time().'.'.$img->getClientOriginalExtension();
                    $img->move('storage/image',$img_name);
                    $update['rp_img']=$img_name;
                }
                
                $update->save();
                return redirect('/show_word_rp_info')->with('message', '5');
            }
            
            }
        }else{
    

            return redirect('/');
            }  
            
        }

    }


