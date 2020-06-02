<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class ExpensController extends Controller
{
  public function __construct()
{
$this->middleware('auth');
}


    public function index()
    {
   return view('inventory.add_expense');
    }

    public function insert(Request $request)
    {
    	$data=array();
    	$data['expens_amount']=$request->expens_amount;
    	$data['expenses_detail']=$request->expenses_detail;
    	$data['month']=$request->month;
    	$data['date']=$request->date;
    	$data['year']=$request->year;
    	
      DB::table('expenses')->insert($data);
$notification=array(
          'messege'=>'Successfully save',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }

    public function today()
    {
    	 $date=date("d/m/y");
        $today=DB::table('expenses')->where('date', $date)->get();
    	// $today=DB::table('expenses')->whereDate('created_at', '=', date('Y-m-d'))->get();
    	return view('inventory.today_expense',compact('today'));
    
    }

    public function edit($id)
    {
      $edit=DB::table('expenses')->where('id',$id)->first();
      return view('inventory.edit_expense',compact('edit'));
    }

    public function update(Request $request,$id)
    {
            $validatedData = $request->validate([
        'expens_amount' => 'required',
        'expenses_detail' => 'required',
        
        ]);
      $data=array();
      $data['expens_amount']=$request->expens_amount;
      $data['expenses_detail']=$request->expenses_detail;
      $data['month']=$request->month;
      $data['date']=$request->date;
      $data['year']=$request->year;
      DB::table('expenses')->where('id',$id)->update($data);
$notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
   return Redirect()->route('today.expense')->with($notification);
    }


    public function month()
    {
      $month=date("F");
      $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly'));
    }

    public function yearly()
    {
            $year=date("Y");
      $yearly=DB::table('expenses')->where('year', $year)->get();
      return view('inventory.year_expense',compact('yearly'));
    }

    public function January()
    {
      $month="January";
       $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly'));

    }
        public function February()
    {
     $month="February";
       $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly'));
      
    }
        public function March()
    {
     $month="March";
       $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly'));
      
    }
        public function April()
    {
     $month="April";
       $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly'));
      
    }
        public function May()
    {
     $month="May";
       $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly'));
      
    }
        public function June()
    {

           $month="June";
       $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly'));
    }
        public function July()
    {

           $month="July";
       $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly'));
    }
        public function August()
    {
     $month="August";
       $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly'));
      
    }
        public function September()
    {
     $month="September";
       $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly'));
      
    }
        public function October()
    {

       $month="October";
       $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly'));
    }
        public function November()
    {

          $month="November";
       $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly')); 
    }
        public function December()
    {
     $month="December";
       $monthly=DB::table('expenses')->where('month', $month)->get();
      return view('inventory.month_expense',compact('monthly'));
      
    }


}
