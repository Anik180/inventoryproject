<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PosController extends Controller
{
      public function __construct()
      {
      $this->middleware('auth');
      }

      public function index()
      {
      	$product=DB::table('products')
      	        ->join('categories','products.category_id','categories.id')
      	        ->select('categories.category_name','products.*')
      	        ->get();
      	$customer=DB::table('customers')->get(); 
      	$cat=DB::table('categories')->get();       
      	return view('inventory.pos',compact('product','customer','cat'));
      }

      public function pendingorders()
      {
            $pending=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','orders.*')
            ->where('order_status','pending')->get();
           return view('inventory.pending_order',compact('pending'));
      }

      public function orderview($id)
      {
            $order=DB::table('orders')
                 ->join('customers','orders.customer_id','customers.id')
                 ->select('customers.*','orders.*')    //  ,'orders.id as order_id'
                 ->where('orders.id',$id)
                 ->first();

            $orders_details=DB::table('orderdetails')
                          ->join('products','orderdetails.product_id','products.id')
                          ->select('orderdetails.*','products.product_name','products.product_code')
                          ->where('order_id',$id)
                          ->get();

                         return view('inventory.confirm_order',compact('order','orders_details'));
                          // echo "<pre>";
                          // print_r( $orders_details);
            
      }

      public function confirmorder($id)
      {
         DB::table('orders')->where('id',$id)->update(['order_status' => 'Success']);

             $notification=array(
               'messege'=>'Order Successfully Approve',
               'alert-type'=>'success'
                 );
                return Redirect()->route('pending.orders')->with($notification);
          // dd($aa);

      }

      public function doneorder()
      {
          $success=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','orders.*')
            ->where('order_status','success')->get();
           return view('inventory.success_order',compact('success'));   
      }
}
