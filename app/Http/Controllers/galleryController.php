<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use Session;
session_start();
class galleryController extends Controller
{
    

    public function show()
    {
        $data_g = gallery::all();

        return view('add_gallery',compact('data_g'));

    }


    
    function insert(request $request)
    {
        $admin_phone = Session::get('admin_phone');
        
        if($admin_phone){
       
            
            // request()->validate([
            //     'p_id' => 'required',
            //     'ps_id' => 'required',
            //     'w_number' => 'required',
                
            //     ],
        
            //     [
            //     'p_id.required' => 'অনুগ্রহ করে আসন বাছাই করুন',
            //     'ps_id.required' => 'অনুগ্রহ করে থানা কমিটি বাছাই করুন',
            //     'w_number.required' => 'অনুগ্রহ করে ওয়ার্ড কমিটি পূরন করুন',
               
            //     ]);
            

            $insert = new gallery;
            
            if($request->hasFile('img')){
                $img = $request->file('img');
                $img_name = time().'.'.$img->getClientOriginalExtension();
                $img->move('storage/gallery/test',$img_name);
                $insert['image']=$img_name;
            }
           

            $insert->save();
            return redirect('/show_gallery');
            }else{
                
                
                return redirect('/insert_gallery');
            }  
            
   
         }





    function gallery(){
        return view('gallery');
    }

}