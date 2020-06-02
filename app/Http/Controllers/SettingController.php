<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
class SettingController extends Controller
{
 public function __construct()
{
$this->middleware('auth');
}


public function company()
{



	$setting=DB::table('settings')->first();
	return view('inventory.setting',compact('setting'));
}



public function update(Request $request,$id)
{
$validatedData = $request->validate([
'company_name' => 'required|max:255',
'company_address' => 'required|max:255',
'company_email' => 'required|max:255',
'company_phone' => 'required',
'company_logo' => 'required',
'company_mobile' => 'required',
'company_country' => 'required|max:255',
'company_city' => 'required',
'company_zipcode' => 'required',

]);
$data=array();
$data['company_name']=$request->company_name;
$data['company_address']=$request->company_address;
$data['company_email']=$request->company_email;
$data['company_phone']=$request->company_phone;
$data['company_mobile']=$request->company_mobile;
$data['company_country']=$request->company_country;
$data['company_city']=$request->company_city;
$data['company_zipcode']=$request->company_zipcode;
         
           $oldimage=$request->oldimage;
           $image=$request->company_logo;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('public/company/'.$image_one);
            $data['company_logo']='public/company/'.$image_one;
            DB::table('settings')->where('id',$id)->update($data);
            unlink($oldimage);
         $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
           }
            $data['company_logo']=$oldimage;
             DB::table('settings')->where('id',$id)->update($data);
            
            $notification=array(
            'messege'=>'Successfully update',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
}

}
