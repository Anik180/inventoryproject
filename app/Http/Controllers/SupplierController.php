<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SupplierController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
}

public function index()
{
	return view('inventory.add_supplier');
}

public function insert(Request $request)
{
	    	$validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:suppliers|max:255',
        'phone' => 'required|unique:suppliers|max:13',
        'address' => 'required',
        'photo' => 'required',
        'city' => 'required',
         ]);

$data=array();
$data['name']=$request->name;
$data['email']=$request->email;
$data['phone']=$request->phone;
$data['address']=$request->address;
$data['type']=$request->type;
$data['shop']=$request->shop;
$data['account_holder']=$request->account_holder;
$data['account_number']=$request->account_number;
$data['bank_name']=$request->bank_name;
$data['branch_name']=$request->branch_name;
$data['city']=$request->city;

$image = $request->file('photo');
 
 if($image){
$image_name= $request->email;
$ext=strtolower($image->getClientOriginalExtension());
$image_full_name=$image_name. '.'.$ext;
$upload_path='public/supplier/';
$image_url=$upload_path.$image_full_name;
$success=$image->move($upload_path,$image_full_name);
if($success){
$data['photo']=$image_url;
$suppliers=DB::table('suppliers')
->insert($data);
if($suppliers){
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
        $all=DB::table('suppliers')->get();
        return view('inventory.all_supplier',compact('all'));
    }

    public function view($id)
    {
        $view=DB::table('suppliers')->where('id',$id)->first();
        return view('inventory.view_supplier',compact('view'));
    }

    public function delete($id)
    {

         $delete=DB::table('suppliers')
         ->where('id',$id)
         ->first();
         $photo=$delete->photo;
         unlink($photo);
         $dltuser=DB::table('suppliers')->where('id',$id)->delete();

         if($dltuser){
        $notification=array(
        'messege'=>'Successfully Delete',
        'alert-type'=>'success'
        );
        return Redirect()->route('all.supplier')->with($notification);
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
            $edit=DB::table('suppliers')->where('id',$id)->first();
           return view('inventory.edit_supplier',compact('edit'));
    }

    public function update(Request $request,$id)
    {
$data=array();
$data['name']=$request->name;
$data['email']=$request->email;
$data['phone']=$request->phone;
$data['address']=$request->address;
$data['type']=$request->type;
$data['shop']=$request->shop;
$data['account_holder']=$request->account_holder;
$data['account_number']=$request->account_number;
$data['bank_name']=$request->bank_name;
$data['branch_name']=$request->branch_name;
$data['city']=$request->city;
$image = $request->photo;

if($image){
$image_name= $request->email;
$ext=strtolower($image->getClientOriginalExtension());
$image_full_name=$image_name. '.'.$ext;
$upload_path='public/supplier/';
$image_url=$upload_path.$image_full_name;
$success=$image->move($upload_path,$image_full_name);
if($success){
$data['photo']=$image_url;
$img=DB::table('suppliers')->where('id',$id)->first();
$image_path = $img->photo;
$done=unlink($image_path);
$customers=DB::table('suppliers')->where('id',$id)->update($data);
if($customers){
$notification=array(
'messege'=>'Successfully update',
'alert-type'=>'success'
);
return Redirect()->route('all.supplier')->with($notification);
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
$oldphoto=$request->old_photo;


if($oldphoto){
$data['photo']=$oldphoto;

$customers=DB::table('suppliers')->where('id',$id)->update($data);
if($customers){
$notification=array(
'messege'=>'Successfully update',
'alert-type'=>'success'
);
return Redirect()->route('all.supplier')->with($notification);
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
}
    }
}
 
