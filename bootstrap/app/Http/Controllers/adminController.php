<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\adminControl;
use App\HTTP\Requests;
// use Symfony\Component\HttpFoundation\Session\Session;
use Session;
Session_start();
class adminController extends Controller
{


 
    public function login(request $request)
        {
            
            $data_login = adminControl::where('phone_num',$request->phone_num)->where('password',$request->password)->first();

            if($data_login===null){
            return redirect('/')->with('message',"0");
            
            }else{
            Session::put('admin_phone',$data_login->phone_num);

            return redirect('/add_parlament_info');
            }
        }


        public function signup(Request $request)
        {

            $insert_admin = new adminControl;
            $insert_admin->phone_num=$request->phone_num;
            $insert_admin->password=$request->password;

            $insert_admin->save();

            redirect('/')->with('message','Please login');


        }


        public function index()
        {

          $admin_phone = Session::get('admin_phone');

         if($admin_phone){
           
            return view('index');
            }else{
            

            return redirect('/');
            }

           
        }


        public function logout(){
            Session::flush();
            return  redirect('/');

        }


     

}
