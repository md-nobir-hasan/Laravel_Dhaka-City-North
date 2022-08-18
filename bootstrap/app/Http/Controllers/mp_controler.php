<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\parlament_seat;
use App\Models\mpDetail;
use Symfony\Contracts\Service\Attribute\Required;
use Session;
Session_start();

class mp_controler extends Controller
{


    function show()
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone){
        
        $data_p = parlament_seat::all();
       $data_mp = DB::table('mp_details')
                    ->join('parlament_seat','mp_details.p_id','=','parlament_seat.id')
                    ->select('mp_details.*','parlament_seat.name','parlament_seat.no')
                  
                    ->get();
        return view('mp_info',compact('data_p','data_mp'));

    }else{
   
        return redirect('/');
        }   

    }



    function insert(request $request)
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone){

            $user = mpDetail::where('p_id',$request->p_id)->first();

            if($user===null){
                $a = $request->p_id;
                // $b = $request->ps_id;
                $c = $request->mp_nid;
                $d = $request->mp_phone;
                $combine = $c.$d;
                $ps = mpDetail::all();
                
            
                  
                   
                        $insert = new mpDetail;
        
        
                        if(empty($request->mp_nid)){
                            $request->mp_nid="N/A";
                        }
                        if(empty($request->mp_phone)){
                            $request->mp_phone="N/A";
                        }
        
                        if(empty($request->mp_email)){
                            $request->mp_email="N/A";
                        }
                        if(empty($request->mp_dob)){
                            $request->mp_dob="N/A";
                        }
                        if(empty($request->mp_img)){
                            $request->mp_img="null_img.png";
                        }
        
        
                        $insert->p_id = $request->p_id;
                        
                        $insert->mp_name= $request->mp_name;
                        $insert->mp_email= $request->mp_email;
                        $insert->mp_phone= $request->mp_phone;
                        $insert->mp_nid= $request->mp_nid;
                        $insert->mp_dob= $request->mp_dob;
                        $insert->mp_img= $request->mp_img;
        
                        if($request->hasFile('mp_img')){
                            $img = $request->File('mp_img');
                            $img_name =time().'.'.$img->getClientOriginalExtension();
                            $img->move('storage/image',$img_name);
        
                            $insert['mp_img']=$img_name;
                          }
                        $insert->save();
                        return redirect('/show_mp_info')->with('message', '1');

            }else{
                return redirect('/show_mp_info')->with('message', '0');
            }

     
        
    }else{
   

        return redirect('/');
        }   

    }



    public function update_page($id){
        $admin_phone = Session::get('admin_phone');

        if($admin_phone){
        
        $data_p = parlament_seat::all();
        $data_mp = mpDetail::where ('id',$id)->first();
        return view('updat_mp_info',compact('data_p','data_mp'));
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
            
            $c = $request->mp_nid;
            $d = $request->mp_phone;
            $combine = $c.$d;
        $ps = mpDetail::all();


                $update = mpDetail::find($id);

                if(empty($request->mp_nid)){
                    $request->mp_nid="N/A";
                }
                if(empty($request->mp_phone)){
                    $request->mp_phone="N/A";
                }

                if(empty($request->mp_email)){
                    $request->mp_email="N/A";
                }
                if(empty($request->mp_dob)){
                    $request->mp_dob="N/A";
                }
                if(empty($request->mp_img)){
                    $request->mp_img="null_img.png";
                }

                $update->p_id = $request->p_id;
                $update->mp_name= $request->mp_name;
                $update->mp_email= $request->mp_email;
                $update->mp_phone= $request->mp_phone;
                $update->mp_nid= $request->mp_nid;

                $update->mp_dob= $request->mp_dob;
                $update->mp_img= $request->mp_img;
               


                if($request->hasFile('mp_img')){
                    
                    $img = $request->File('mp_img');
                    $img_name =time().'.'.$img->getClientOriginalExtension();
                    $img->move('storage/image',$img_name);

                    $update['mp_img']=$img_name;
                   
                  }

                $update->save();
                return redirect('/show_mp_info')->with('message', '5');
            
            
        
    }else{
   

        return redirect('/');
        }   

    }



}
