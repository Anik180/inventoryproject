<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Image;
class ProductController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
     }

     public function index()
     {
     	return view('inventory.add_product');
     }

    public function insert(Request $request)
    {
    	   	$validatedData = $request->validate([
        'product_name' => 'required|max:255',
        'category_id' => 'required|max:255',
        'supplier_id' => 'required|max:255',
        'product_code' => 'required',
        'product_warehouse' => 'required',
        'product_route' => 'required',
        'product_image' => 'required',
        'buy_date' => 'required',
        'expire_date' => 'required',
        'buying_price' => 'required',
        'selling_price' => 'required',

         ]);

$data=array();
$data['product_name']=$request->product_name;
$data['category_id']=$request->category_id;
$data['supplier_id']=$request->supplier_id;
$data['product_code']=$request->product_code;
$data['product_warehouse']=$request->product_warehouse;
$data['product_route']=$request->product_route;
$data['buy_date']=$request->buy_date;
$data['expire_date']=$request->expire_date;
$data['buying_price']=$request->buying_price;
$data['selling_price']=$request->selling_price;

$image = $request->file('product_image');
 
 if($image){
$image_name= $request->product_code;
$ext=strtolower($image->getClientOriginalExtension());
$image_full_name=$image_name. '.'.$ext;
$upload_path='public/product/';
$image_url=$upload_path.$image_full_name;
$success=$image->move($upload_path,$image_full_name);
if($success){
$data['product_image']=$image_url;
$products=DB::table('products')
->insert($data);
if($products){
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
    	$all=DB::table('products')->get();
    	return view('inventory.all_product',compact('all'));
    }

    public function delete($id)
    {
    	 $delete=DB::table('products')
         ->where('id',$id)
         ->first();
         $photo=$delete->product_image;
         unlink($photo);
         $dltuser=DB::table('products')->where('id',$id)->delete();

         if($dltuser){
		$notification=array(
		'messege'=>'Successfully Delete',
		'alert-type'=>'success'
		);
		return Redirect()->route('all.product')->with($notification);
		}else{
		$notification=array(
		'messege'=>'error',
		'alert-type'=>'danger'
		);
		return Redirect()->back()->with($notification);
	}
    }

    public function view($id)
    {
    	$prod=DB::table('products')
    	->join('categories','products.category_id','categories.id')
    	->join('suppliers','products.supplier_id','suppliers.id')
    	->select('categories.category_name','products.*','suppliers.name')
    	->where('products.id',$id)
    	->first();
    	return view('inventory.view_product',compact('prod'));
    }

    public function edit($id)
    {
    	$edit=DB::table('products')->where('id',$id)->first();
        return view('inventory.edit_product',compact('edit'));
    }

    public function update(Request $request,$id)
    {
       
    	 $validatedData = $request->validate([
        'category_id' => 'required',
        'supplier_id' => 'required',
     ]);

$data=array();
$data['product_name']=$request->product_name;
$data['category_id']=$request->category_id;
$data['supplier_id']=$request->supplier_id;
$data['product_code']=$request->product_code;
$data['product_warehouse']=$request->product_warehouse;
$data['product_route']=$request->product_route;
$data['buy_date']=$request->buy_date;
$data['expire_date']=$request->expire_date;
$data['buying_price']=$request->buying_price;
$data['selling_price']=$request->selling_price;
         
           $oldimage=$request->oldimage;
           $image=$request->product_image;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('public/product/'.$image_one);
            $data['product_image']='public/product/'.$image_one;
            DB::table('products')->where('id',$id)->update($data);
            unlink($oldimage);
         $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
            return Redirect()->route('all.product')->with($notification);
           }
            $data['product_image']=$oldimage;
             DB::table('products')->where('id',$id)->update($data);
            
            $notification=array(
            'messege'=>'Successfully update',
            'alert-type'=>'success'
             );
            return Redirect()->route('all.product')->with($notification);
    }


    public function Productimport()
    {
        return view('inventory.import_product');
    }


      public function export() 
    {
        return Excel::download(new ProductExport, 'Product.xlsx');
    }

    public function import(Request $request)
    {

         Excel::import(new ProductImport, $request->file('import_file'));
              $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
                return Redirect()->route('all.product')->with($notification);
        
    }

    }

