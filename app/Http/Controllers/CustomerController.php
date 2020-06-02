<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CustomerController extends Controller
{
  public function __construct()
{
$this->middleware('auth');
}


   public function index()
    {
    return view('inventory.add_customer');
    }
    public function insert(Request $request)
    {
    	$validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:customers|max:255',
        'phone' => 'required|unique:customers|max:13',
        'address' => 'required',
        'photo' => 'required',
        'city' => 'required',
         ]);

$data=array();
$data['name']=$request->name;
$data['email']=$request->email;
$data['phone']=$request->phone;
$data['address']=$request->address;
$data['nid_no']=$request->nid_no;
$data['shopname']=$request->shopname;
$data['account_holder']=$request->account_holder;
$data['account_number']=$request->account_number;
$data['bank_name']=$request->bank_name;
$data['bank_branch']=$request->bank_branch;
$data['city']=$request->city;
$image = $request->file('photo');
 
 if($image){
$image_name= $request->email;
$ext=strtolower($image->getClientOriginalExtension());
$image_full_name=$image_name. '.'.$ext;
$upload_path='public/customer/';
$image_url=$upload_path.$image_full_name;
$success=$image->move($upload_path,$image_full_name);
if($success){
$data['photo']=$image_url;
$customer=DB::table('customers')
->insert($data);
if($customer){
$notification=array(
'messege'=>'Successfully Save',
'alert-type'=>'success'
);
return Redirect()->back()->with($notification);
}else{
$notification=array(
'messege'=>'error',
'alert-type'=>'danger'
);
return Redirect()->back()->with($notification);
}
}else{
return Redirect()->back();
}
}else{
return Redirect()->back();
}

 

    }

    public function all()
    {
    	$all=DB::table('customers')->get();
    	return view('inventory.all_customer',compact('all'));
    }
    public function view($id)
    {
  $view=DB::table('customers')->where('id',$id)->first();
  return view('inventory.customer_view',compact('view'));
    }

    public function delete($id)
    {
    	 $delete=DB::table('customers')
         ->where('id',$id)
         ->first();
         $photo=$delete->photo;
         unlink($photo);
         $dltuser=DB::table('customers')->where('id',$id)->delete();

         if($dltuser){
		$notification=array(
		'messege'=>'Successfully Delete',
		'alert-type'=>'success'
		);
		return Redirect()->route('all.customer')->with($notification);
		}else{
		$notification=array(
		'messege'=>'error',
		'alert-type'=>'danger'
		);
		return Redirect()->back()->with($notification);
	}
    }

    public function edit($id)
    {
    	$edit=DB::table('customers')->where('id',$id)->first();
      return view('inventory.edit_customer',compact('edit'));
    }

    public function update(Request $request,$id)
    {
// $validatedData = $request->validate([
//         'name' => 'required|max:255',
//         'email' => 'required|max:255',
//         'phone' => 'required|max:13',
//         'address' => 'required',
//         'photo' => 'required',
//         'city' => 'required',
//          ]); 
 $data=array();
$data['name']=$request->name;
$data['email']=$request->email;
$data['phone']=$request->phone;
$data['address']=$request->address;
$data['nid_no']=$request->nid_no;
$data['shopname']=$request->shopname;
$data['account_holder']=$request->account_holder;
$data['account_number']=$request->account_number;
$data['bank_name']=$request->bank_name;
$data['bank_branch']=$request->bank_branch;
$data['city']=$request->city;
$image = $request->photo;

if($image){
$image_name= $request->email;
$ext=strtolower($image->getClientOriginalExtension());
$image_full_name=$image_name. '.'.$ext;
$upload_path='public/employee/';
$image_url=$upload_path.$image_full_name;
$success=$image->move($upload_path,$image_full_name);
if($success){
$data['photo']=$image_url;
$img=DB::table('customers')->where('id',$id)->first();
$image_path = $img->photo;
$done=unlink($image_path);
$customers=DB::table('customers')->where('id',$id)->update($data);
if($customers){
$notification=array(
'messege'=>'Successfully update',
'alert-type'=>'success'
);
return Redirect()->route('all.customer')->with($notification);
}else{
$notification=array(
'messege'=>'error',
'alert-type'=>'danger'
);
return Redirect()->back()->with($notification);
}
}else{
return Redirect()->back();
}
}else{
return Redirect()->back();
}

}
}

