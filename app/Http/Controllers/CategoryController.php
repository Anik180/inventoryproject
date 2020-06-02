<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
      public function __construct()
      {
      $this->middleware('auth');
      }

      public function index()
      {
      	return view ('inventory.add_category');
      }

      public function insert(Request $request)

      {

      	  	 $validatedData = $request->validate([
        'category_name' => 'required|max:55',
        
        ]);
      	
 $data=array();
      $data['category_name']=$request->category_name;
      DB::table('categories')->insert($data);
$notification=array(
          'messege'=>'Successfully Saev',
           'alert-type'=>'success'
             );
   return Redirect()->route('all.category')->with($notification);
      }

      public function all()
      {
      	$all=DB::table('categories')->get();
      	return view('inventory.all_category',compact('all'));
      }

      public function delete($id)
      {
      	DB::table('categories')->where('id',$id)->delete();
      	$notification=array(
          'messege'=>'Successfully delete',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);

      }

      public function edit($id)
      {
     $category=DB::table('categories')->where('id',$id)->first();
      return view('inventory.category_edit',compact('category'));
      }

      public function update(Request $request,$id)
      {
      	 $validatedData = $request->validate([
        'category_name' => 'required|max:55',
        
        ]);
      $data=array();
      $data['category_name']=$request->category_name;
      DB::table('categories')->where('id',$id)->update($data);
$notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
   return Redirect()->route('all.category')->with($notification);
      }

}
