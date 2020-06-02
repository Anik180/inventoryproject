<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendence;
class AttendenceController extends Controller
{
       public function __construct()
      {
      $this->middleware('auth');
      }

      public function take()
      {
      	$employees=DB::table('employees')->get();
      	return view('inventory.take_attendence',compact('employees'));
      }

      public function insert(Request $request)
      {
      	$date=$request->attendence_date;
      	$attendence_date=DB::table('attendences')->where('attendence_date',$date)->first();
      	if($attendence_date) {
      		 $notification=array(
          'messege'=>' Attendence Allready Taken',
           'alert-type'=>'error'
       );
           return Redirect()->back()->with($notification);
      	}else{
      		    foreach ($request->user_id as  $id) {
    	$data[]=[
    		"user_id"=>$id,
    		"attendence"=>$request->attendence[$id],
    		"attendence_date"=>$request->attendence_date,
    		"attendence_year"=>$request->attendence_year,
    		"month"=>$request->month,
    		"edit_date"=>date("d_m_y"),
    	];
    }
          DB::table('attendences')->insert($data);
          $notification=array(
          'messege'=>'Successfully Attendence Taken',
           'alert-type'=>'success'
       );
           return Redirect()->back()->with($notification);
      	}

      }
      public function all()
      {
      	$all_att=DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get();
      	return view('inventory.all_attendence',compact('all_att'));
      }

      public function edit($edit_date)
      {
      	
      	$date=DB::table('attendences')->where('edit_date',$edit_date)->first();
      	$data=DB::table('attendences')->join('employees','attendences.user_id','employees.id')->select('employees.name','employees.photo','attendences.*')->where('edit_date',$edit_date)->get();
      	return view('inventory.edit_attendense',compact('data','date'));

      }

      public function update(Request $request)
      {
           foreach ($request->id as  $id) {
    	$data=[
    		"attendence"=>$request->attendence[$id],
    		"attendence_date"=>$request->attendence_date,
    		"attendence_year"=>$request->attendence_year,
    		"month"=>$request->month,
    		
    	];
    	$attendence= Attendence::where(['attendence_date'=>$request->attendence_date, 'id'=>$id])->first();
    	$attendence->update($data);
    }
       $notification=array(
          'messege'=>' Attendence update ',
           'alert-type'=>'success'
       );
           return Redirect()->back()->with($notification);
      }

      public function view($edit_date)
      {
 	$date=DB::table('attendences')->where('edit_date',$edit_date)->first();
      	$data=DB::table('attendences')->join('employees','attendences.user_id','employees.id')->select('employees.name','employees.photo','attendences.*')->where('edit_date',$edit_date)->get();
      	return view('inventory.view_attendense',compact('data','date'));
      }

}
