<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SalaryController extends Controller
{
     public function __construct()
{
$this->middleware('auth');
}

public function index()
{
	$employee=DB::table('employees')->get();
	return view('inventory.pay_salary',compact('employee'));
}
}
