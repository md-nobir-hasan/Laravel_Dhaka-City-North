<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\parlament_seat;
use Session;
Session_start();

class parlamentController extends Controller
{





function insert(request $request){

    $admin_phone = Session::get('admin_phone');

    if($admin_phone)
    {

         $user = parlament_seat::where('no', '=', $request->input('no'))->first();
        if ($user ===null) {
        $insert = new parlament_seat;
        $insert->name= $request->name ;
        $insert->no= $request->no;
        $insert->save();
        // echo "<script> alert('done'); </script>";
            return redirect('/add_parlament_info')->with('message', '1');
        }else{
        $msg= 'This value is exist';
            return redirect('/add_parlament_info')->with('message', '0');

        }
        }else{
    

        return redirect('/');
        }
 
       
       
    }
    function show()
    {
      
            $admin_phone = Session::get('admin_phone');

            if($admin_phone){

            $data_fetch = parlament_seat::all();
            return view('add_parlament_info',['data'=>$data_fetch,"data_noti"=>'yes']);
            }else{
   

            return redirect('/');
            }
         
    }
   
    function update_page($id)
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {

            $data = parlament_seat::where ('id',$id)->first();
            return view('parlament_update_page',compact('data'));
        }else{
    

            return redirect('/');
            }
     
    }

     function update(request $request,$id)
     {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {

            $update = parlament_seat::where('id',$id)->first();
    
            $update->name= $request->name ;
            $update->no= $request->no;
            $update->save();
            return redirect('/add_parlament_info')->with('message', '5');
         }else{
        

        return redirect('/');
        }
     
        
    }
   
}
