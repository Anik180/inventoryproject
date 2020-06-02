<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Employee;
use Image;
class EmployeeController extends Controller
{
public function __construct()
{
$this->middleware('auth');
}
public function index()
{
return view('inventory.add_employee');
}
public function insert(Request $request)
{
$validatedData = $request->validate([
'name' => 'required|max:255',
'email' => 'required|unique:employees|max:255',
'phone' => 'required|max:13',
'address' => 'required',
'experience' => 'required',
'photo' => 'required',
'nid_no' => 'required|unique:employees|max:255',
'salary' => 'required',
'vacation' => 'required',
'city' => 'required',
]);
$data=array();
$data['name']=$request->name;
$data['email']=$request->email;
$data['phone']=$request->phone;
$data['address']=$request->address;
$data['experience']=$request->experience;
$data['nid_no']=$request->nid_no;
$data['salary']=$request->salary;
$data['vacation']=$request->vacation;
$data['city']=$request->city;
$image = $request->file('photo');
if($image){
$image_name= $request->email;
$ext=strtolower($image->getClientOriginalExtension());
$image_full_name=$image_name. '.'.$ext;
$upload_path='public/employee/';
$image_url=$upload_path.$image_full_name;
$success=$image->move($upload_path,$image_full_name);
if($success){
$data['photo']=$image_url;
$emoloyee=DB::table('employees')
->insert($data);
if($emoloyee){
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
$all=DB::table('employees')->get();
return view('inventory.all_employee',compact('all'));
}
public function view($id)
{
$view=DB::table('employees')->where('id',$id)->first();
return view('inventory.employee_view',compact('view'));
}

public function delete($id)
{
  $delete=DB::table('employees')
  ->where('id',$id)
  ->first();
  $photo=$delete->photo;
  unlink($photo);
  $dltuser=DB::table('employees')->where('id',$id)->delete();

if($dltuser){
$notification=array(
'messege'=>'Successfully Delete',
'alert-type'=>'success'
);
return Redirect()->route('all.employee')->with($notification);
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
$edit=DB::table('employees')->where('id',$id)->first();
return view('inventory.edit_employee',compact('edit'));
}

public function update(Request $request,$id)
{
 $validatedData = $request->validate([
'name' => 'required|max:255',
'email' => 'required||max:255',
'phone' => 'required|max:13',
'address' => 'required',
'experience' => 'required',
'nid_no' => 'required||max:255',
'salary' => 'required',
'vacation' => 'required',
'city' => 'required',
]); 
 $data=array();
$data['name']=$request->name;
$data['email']=$request->email;
$data['phone']=$request->phone;
$data['address']=$request->address;
$data['experience']=$request->experience;
$data['nid_no']=$request->nid_no;
$data['salary']=$request->salary;
$data['vacation']=$request->vacation;
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
$img=DB::table('employees')->where('id',$id)->first();
$image_path = $img->photo;
$done=unlink($image_path);
$emoloyee=DB::table('employees')->where('id',$id)->update($data);
if($emoloyee){
$notification=array(
'messege'=>'Successfully update',
'alert-type'=>'success'
);
return Redirect()->route('all.employee')->with($notification);
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