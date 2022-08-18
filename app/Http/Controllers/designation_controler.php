<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\designation;
use Session;
Session_start();

class designation_controler extends Controller
{
   
    
        function show()
        {
        
            $data_fetch = designation::all();
            return view('designation_info',['data'=>$data_fetch]);
        }

 
        function insert(request $request)
        {
            $user = designation::where('d_name', '=', $request->input('d_name'))->first();
            if ($user ===null)
             {
                $insert = new designation;
                $insert->d_name= $request->d_name ;
                $insert->save();
         
                 return redirect('/show_designation_info')->with('message', '1');
            }else
            {
                 return redirect('/show_designation_info')->with('message', '0');
            }
           
           
        }
    }
