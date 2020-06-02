<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdvancedsalaryController extends Controller
{
         public function __construct()
{
$this->middleware('auth');
}

public function index()
{
	return view('inventory.advanced_salary');
}

public function insert(Request $request)
{

$month=$request->month;
$employee_id=$request->employee_id;

$advanced_salary=DB::table('advanced_salaries')
->where('month',$month)
->where('employee_id',$employee_id)
->first();

if($advanced_salary === NULL) {
  
$data=array();
$data['employee_id']=$request->employee_id;
$data['month']=$request->month;
$data['year']=$request->year;
$data['advanced_salary']=$request->advanced_salary;

      DB::table('advanced_salaries')->insert($data);
$notification=array(
          'messege'=>'Successfully save',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
}else{

  $notification=array(
          'messege'=>'Allready Advanced Paid this month',
           'alert-type'=>'error'
             );
   return Redirect()->back()->with($notification);
}
  

}

public function all()
{

  $salary=DB::table('advanced_salaries')
  ->join('employees','advanced_salaries.employee_id','employees.id')
  ->select('advanced_salaries.*','employees.name','employees.salary','employees.photo')
  ->orderBy('id','DESC')
  ->get();
  return view('inventory.all_advanced_salary',compact('salary'));
}
}
