<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
class CartController extends Controller
{
         public function __construct()
      {
      $this->middleware('auth');
      }

      public function index(Request $request)
      {
      	$data=array();
      	$data['id']=$request->id;
      	$data['name']=$request->name;
      	$data['qty']=$request->qty;
      	$data['price']=$request->price;
        $data['weight']=$request->weight;
      	Cart::add($data);
      	        $notification=array(
          'messege'=>'Successfully Added',
           'alert-type'=>'success'
             );
                return Redirect()->back()->with($notification);
      }

      public function UpdateQTY(Request $request,$rowId)
      {
      	$qty=$request->qty;
      	Cart::update($rowId,$qty);

      	    $notification=array(
            'messege'=>'Successfully Update',
           'alert-type'=>'success'
             );
                return Redirect()->back()->with($notification);
      }

      public function Updateweight(Request $request,$rowId)
      {
      	$weight=$request->weight;
      	Cart::update($rowId,$weight);

      	    $notification=array(
            'messege'=>'Successfully Update',
           'alert-type'=>'success'
             );
                return Redirect()->back()->with($notification);
      }

      public function delete($rowId)
      {
      	 Cart::remove($rowId);
      	    	    $notification=array(
                   'messege'=>'Successfully Delete',
                     'alert-type'=>'success'
                       );
                return Redirect()->back()->with($notification);
      }

      public function invoice(Request $request)
      {
 	   	$request->validate([
        'customer_id' => 'required',
         ],
         [
         	'customer_id.required' => 'Customer Required*'
         ]);

 	   	$customer_id=$request->customer_id;
 	   	$customer=DB::table('customers')->where('id',$customer_id)->first();
 	   	$content=Cart::content();

      return view('inventory.invoice',compact('customer','content'));
      }

      public function maininvoice(Request $request)
      {
        $data=array();
      	$data['customer_id']=$request->customer_id;
      	$data['order_date']=$request->order_date;
      	$data['order_status']=$request->order_status;
      	$data['total_product']=$request->total_product;
        $data['sub_total']=$request->sub_total;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['payment_status']=$request->payment_status;
        $data['pay']=$request->pay;
        $data['due']=$request->due;
$order_id=DB::table('orders')->insertGetId($data);
$content=Cart::content();
$odata=array();
foreach ($content as $con) {
	$odata['order_id']=$order_id;
	$odata['product_id']=$con->id;
	$odata['quantity']=$con->qty;
	$odata['unitcost']=$con->price;
	$odata['weight']=$con->weight;
	$odata['total']=$con->total;
	DB::table('orderdetails')->insert($odata);
}
             $notification=array(
                   'messege'=>'Successfully invoice Create',
                     'alert-type'=>'success'
                       );
             Cart::destroy();
            return Redirect()->route('pos')->with($notification);
      }

}
