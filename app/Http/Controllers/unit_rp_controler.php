<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\parlament_seat;
use App\Models\police_stations;
use App\Models\words;
use App\Models\u_model;
use App\Models\designation;
use App\Models\mpDetail;
use App\Models\policeStationResponsibleParson;
use App\Models\word_rp;
use App\Models\unitRP;
use Session;
Session_start();

class unit_rp_controler extends Controller
{
    function show()
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {      
   
        
        $data_p = parlament_seat::orderBy('no')->get();
        $data_designation = designation::all();

       $data_join = DB::table('unit_r_p_s')
                    ->join('parlament_seat','unit_r_p_s.p_id','=','parlament_seat.id')
                    ->join('police_stations','unit_r_p_s.ps_id','=','police_stations.id')
                    ->join('words','unit_r_p_s.w_id','=','words.id')
                    ->join('units','unit_r_p_s.u_id','=','units.id')
                    ->join('designation','unit_r_p_s.d_id','=','designation.id')
                    ->select('unit_r_p_s.*','police_stations.PS_name','parlament_seat.name','parlament_seat.no','designation.d_name','words.w_number','units.union_name')   
                    ->orderBy('parlament_seat.no')
                    ->get();
        
        return view('ps_unit_info',compact('data_p','data_join','data_designation'));
               
    }else{
   
        return redirect('/');
        }   

    }



     function ajax($p_id,$ps_id,$w_id)
     {
             
        if($ps_id=='সকল' && $w_id=='সকল')
        {


            // echo ("yes");
            $data_join = DB::table('units')
                ->join('parlament_seat','units.p_id','=','parlament_seat.id')
                ->join('police_stations','units.ps_id','=','police_stations.id')
                ->join('words','units.w_id','=','words.id')
                ->select('units.*')
                ->where('units.p_id','=',$p_id)
                ->get();

                // dd($data_join);
                // echo (count())
                return response()->json($data_join);

            }
            elseif($ps_id=='সকল' && $w_id!='সকল')
            {

                $data_join = DB::table('units')
                ->join('parlament_seat','units.p_id','=','parlament_seat.id')
                ->join('police_stations','units.ps_id','=','police_stations.id')
                ->join('words','units.w_id','=','words.id')
                ->select('units.*')
                ->where('units.p_id','=',$p_id)
                ->where('units.w_id','=',$w_id)
                ->get();

                // dd($data_join);
                // echo (count())
                return response()->json($data_join);
            }
            elseif($ps_id!='সকল' && $w_id=='সকল')
            {

                $data_join = DB::table('units')
                ->join('parlament_seat','units.p_id','=','parlament_seat.id')
                ->join('police_stations','units.ps_id','=','police_stations.id')
                ->join('words','units.w_id','=','words.id')
                ->select('units.*')
                ->where('units.p_id','=',$p_id)
                ->where('units.ps_id','=',$ps_id)
                ->get();

                // dd($data_join);
                // echo (count())
                return response()->json($data_join);
            }
            elseif($ps_id!='সকল' && $w_id!='সকল')
            {

                $data_join = DB::table('units')
                ->join('parlament_seat','units.p_id','=','parlament_seat.id')
                ->join('police_stations','units.ps_id','=','police_stations.id')
                ->join('words','units.w_id','=','words.id')
                ->select('units.*')
                ->where('units.p_id','=',$p_id)
                ->where('units.ps_id','=',$ps_id)
                ->where('units.w_id','=',$w_id)
                ->get();

                // dd($data_join);
                // echo (count())
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
                'd_id' => 'required',
                'u_id' => 'required',
                'rp_name' => 'required',
                
                ],
        
                [
                'p_id.required' => 'অনুগ্রহ করে আসন বাছাই করুন',
                'ps_id.required' => 'অনুগ্রহ করে থানা কমিটি বাছাই করুন',
                'w_id.required' => 'অনুগ্রহ করে ওয়ার্ড কমিটি বাছাই করুন',
                'u_id.required' => 'অনুগ্রহ করে ইউনিট কমিটি বাছাই করুন',
                'd_id.required' => 'অনুগ্রহ করে পদবি  বাছাই করুন',
                'rp_name.required' => 'অনুগ্রহ করে নাম লিখুন',
               
                ]);


        $user = DB::table('unit_r_p_s')
       
        ->where('unit_r_p_s.p_id',$request->p_id)
        ->where('unit_r_p_s.ps_id',$request->ps_id)
        ->where('unit_r_p_s.w_id',$request->w_id)
        ->where('unit_r_p_s.u_id',$request->u_id)
        ->where('unit_r_p_s.d_id',$request->d_id)
        ->first();

        if($user===null)
        {


                $user_nid = DB::table('unit_r_p_s')
                       ->where('unit_r_p_s.rp_nid',$request->rp_nid)
                       ->first();

                $user_phone = DB::table('unit_r_p_s')
                       ->where('unit_r_p_s.rp_phone',$request->rp_phone)
                       ->first();

                $user_email = DB::table('unit_r_p_s')
                       ->where('unit_r_p_s.rp_email',$request->rp_email)
                       ->first();



            if($user_nid===null && $user_email===null && $user_phone==null)
            {

                $insert = new unitRP;
                
                    // if(empty($request->rp_email)){
                    //     $request->rp_email="N/A";
                    // }
                    // if(empty($request->rp_dob)){
                    //     $request->rp_dob="N/A";
                    // }
    
                    // if(empty($request->rp_img)){
                    //     $request->rp_img="null_img.png";
                    // }

                if(empty($request->rp_phone)){
                    $request->rp_phone="N/A";
                }

                if(empty($request->rp_nid)){
                    $request->rp_nid="N/A";
                }

                if(empty($request->rp_email)){
                    $request->rp_email="N/A";
                }

                if(empty($request->rp_dob)){
                    $request->rp_dob="N/A";
                }
    
                if(empty($request->rp_img)){
                    $request->rp_img="null_img.png";
                }
    

                $insert->p_id = $request->p_id;
                $insert->ps_id = $request->ps_id;
                $insert->w_id = $request->w_id;
                $insert->u_id = $request->u_id;
                $insert->d_id = $request->d_id;
                $insert->rp_name= $request->rp_name;
                $insert->rp_phone= $request->rp_phone;
                $insert->rp_nid= $request->rp_nid;
                $insert->rp_img= $request->rp_img;
    
    
                $insert->rp_email= $request->rp_email;
                $insert->rp_dob= $request->rp_dob;
    
                if($request->hasFile('rp_img')){
                    $img = $request->file('rp_img');
                    $img_name = time().'.'.$img->getClientOriginalExtension();
                    $img->move('storage/image',$img_name);
                    $insert['rp_img']=$img_name;
                }
    
    
    
                $insert->save();
    
                return redirect('/show_unit_rp_info')->with('message', '1');

            }else{
                return redirect('/show_unit_rp_info')->with('message', '0');
            }


            }else{
                return redirect('/show_unit_rp_info')->with('message', '0');
            }


                   
    }else{
   
        return redirect('/');
        }   
   }


   public function update_page($id){
    $admin_phone = Session::get('admin_phone');

    if($admin_phone)
    {
        


     



    $data_p = parlament_seat::orderBy('no')->get();
    $data_designation = designation::all();
    $data_unit_rp = unitRP::where ('id',$id)->first();

    $data_join = DB::table('unit_r_p_s')
    ->join('parlament_seat','unit_r_p_s.p_id','=','parlament_seat.id')
    ->join('police_stations','unit_r_p_s.ps_id','=','police_stations.id')
    ->join('designation','unit_r_p_s.d_id','=','designation.id')
    ->join('words','unit_r_p_s.w_id','=','words.id')
    ->join('units','unit_r_p_s.u_id','=','units.id')
    ->select('unit_r_p_s.*','police_stations.PS_name','parlament_seat.name','parlament_seat.no','designation.d_name','words.w_number','units.union_name')
    ->where('unit_r_p_s.id',$id)
    ->first();

    return view('update_ps_unit_info',compact('data_p','data_designation','data_unit_rp','data_join'));
           
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
            'd_id' => 'required',
            'u_id' => 'required',
            'rp_name' => 'required',
            
            ],
    
            [
            'p_id.required' => 'অনুগ্রহ করে আসন বাছাই করুন',
            'ps_id.required' => 'অনুগ্রহ করে থানা কমিটি বাছাই করুন',
            'w_id.required' => 'অনুগ্রহ করে ওয়ার্ড কমিটি বাছাই করুন',
            'u_id.required' => 'অনুগ্রহ করে ইউনিট কমিটি বাছাই করুন',
            'd_id.required' => 'অনুগ্রহ করে পদবি  বাছাই করুন',
            'rp_name.required' => 'অনুগ্রহ করে নাম লিখুন',
           
            ]);


   $a = $request->p_id;
   $b = $request->ps_id;
   $c = $request->d_id;
   $d = $request->w_id;
   $e = $request->u_id;
   $f = $request->rp_nid;
   $g = $request->rp_phone;
//    $combine = $a.$b.$c.$d.$e;
   $ps = unitRP::all();
   $search='';

  

  
//    foreach($ps as $data)
//        {
//            $search='';
//            $com = $data->p_id.$data->ps_id.$data->d_id.$data->w_id.$data->u_id;
   
//            if($combine==$com){
               
//                $search=$com;

//            }else{
           
               
//            }
        
//     }


    //     if($search==$combine)
    //    {
    //        return redirect('/update_page_unit_rp/'.$id)->with('message', '0');
    //    }
    //    else{
        //    foreach($ps as $data)
        //    {
         

        //        $com = "0";
        //        if($data->rp_nid==$f ||$data->rp_phone ==$g){
        //            $search=$com;
               
   
        //        }
        //    }
        //    if($search=='0'){
        //        return redirect('/update_page_unit_rp/'.$id)->with('message', '0');
        //    }
        //    else{
               $update =unitRP::find($id);

            // if(empty($request->rp_email)){
            //     $request->rp_email="N/A";
            // }
            // if(empty($request->rp_dob)){
            //     $request->rp_dob="N/A";
            // }

            // if(empty($request->rp_img)){
            //     $request->rp_img="null_img.png";
            // }

             if(empty($request->rp_phone)){
                $request->rp_phone="N/A";
            }

            if(empty($request->rp_nid)){
                $request->rp_nid="N/A";
            }

            if(empty($request->rp_email)){
                $request->rp_email="N/A";
            }

            if(empty($request->rp_dob)){
                $request->rp_dob="N/A";
            }
    
            if(empty($request->rp_img)){
                $request->rp_img="null_img.png";
            }

               $update->p_id = $request->p_id;
               $update->ps_id = $request->ps_id;
               $update->w_id = $request->w_id;
               $update->u_id = $request->u_id;
               $update->d_id = $request->d_id;
               $update->rp_name= $request->rp_name;
               $update->rp_phone= $request->rp_phone;
               $update->rp_nid= $request->rp_nid;


               $update->rp_email= $request->rp_email;
               $update->rp_dob= $request->rp_dob;
               $update->rp_img= $request->rp_img;

             

                if($request->hasFile('rp_img'))
                {
                    

                    $img = $request->file('rp_img');
                    $img_name = time().'.'.$img->getClientOriginalExtension();
                    $img->move('storage/image',$img_name);
                    $update['rp_img']=$img_name;
                }

               $update->save();

               return redirect('/show_unit_rp_info')->with('message', '5');
           }else{
   
            return redirect('/');
            } 
        // }
           
    //    }
           
  
}





    function deletes($model,$id)
    {
        $admin_phone = Session::get('admin_phone');

        if($admin_phone)
        {

            if($model=="parlament_seat")
            {
                $delete_row=parlament_seat::find($id);
                $delete_row->delete();
                return redirect('/add_parlament_info')->with('message', '4');
            }
            elseif($model=="police_stations"){
                $delete_row=police_stations::find($id);
                $delete_row->delete();
                return redirect('/Add_Police_Station')->with('message', '4');
            }
            elseif($model=="words"){
                $delete_row=words::find($id);
                $delete_row->delete();
                return redirect('/add_word_info')->with('message', '4');
            }
            elseif($model=="u_model"){
                $delete_row=u_model::find($id);
                $delete_row->delete();
                return redirect('/add_unit_info')->with('message', '4');
            }
            elseif($model=="designation"){
                $delete_row=designation::find($id);
                $delete_row->delete();
                return redirect('/show_designation_info')->with('message', '4');
            }
            elseif($model=="mpDetail"){
                $delete_row=mpDetail::find($id);
                $delete_row->delete();
                return redirect('/show_mp_info')->with('message', '4');
            }
            elseif($model=="policeStationResponsibleParson"){
                $delete_row=policeStationResponsibleParson::find($id);
                $delete_row->delete();
                return redirect('/show_thana_rs_info')->with('message', '4');
            }
            elseif($model=="word_rp"){
                $delete_row=word_rp::find($id);
                $delete_row->delete();
                return redirect('/show_word_rp_info')->with('message', '4');
            }
            elseif($model=="unitRP"){
                $delete_row=unitRP::find($id);
                $delete_row->delete();
                return redirect('/show_unit_rp_info')->with('message', '4');
            }

               
    }else{
   
        return redirect('/');
        }   
        
    }

}
