@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Product</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Add Product</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <!-- left column -->
         <div class="col-md-8 offset-lg-2 shadow p-3 mb-5 bg-light rounded">
            <!-- jquery validation -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Add Product</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
            <form action="{{route('insert.product')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Product Name</label>
                           <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name" required>
                        </div>
                        <div class="form-group col-md-6">
                           <label >Category Name</label>
                           @php
                          $cat=DB::table('categories')->get(); 

                           @endphp
                           <select  class="form-control" name="category_id">
                           	<option disabled="" selected="">Select One</option>
                            @foreach($cat as $row)
                           	<option value="{{$row->id}}">{{$row->category_name}}</option>
                           	@endforeach
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="exampleInputEmail1">Supplier Name </label>
                             @php
                          $sup=DB::table('suppliers')->get(); 
                           @endphp
                            <select class="form-control" name="supplier_id">
                           	<option disabled="" selected="" >Select One</option>
                           	    @foreach($sup as $row)
                           	<option value="{{$row->id}}">{{$row->name}}</option>
                           	@endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label >Product Code</label>
                           <input type="text" name="product_code" class="form-control" id="product_code" placeholder="Enter Product Code" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Product Warehouse</label>
                           <input type="text" name="product_warehouse" class="form-control" id="product_warehouse" placeholder="Enter Product Warehouse" required>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="exampleInputPassword1">Product Route</label>
                           <input type="text" name="product_route" class="form-control" id="product_route" placeholder="Emter Product Route" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label>Buy Date</label>
                           <input type="date" name="buy_date" class="form-control" id="buy_date"  required>
                        </div>
                        <div class="form-group col-md-6">
                           <label >Expire Date</label>
                           <input type="text" name="expire_date" class="form-control" id="expire_date"   required>
                        </div>
                     </div>
                        <div class="row">
                  
                        <div class="form-group col-md-6">
                           <label >Buying Price</label>
                           <input type="text" name="buying_price" class="form-control" id="buying_price" placeholder="Enter Buying Price"  required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Selling Price</label>
                           <input type="text" name="selling_price" class="form-control" id="selling_price" placeholder="Enter Selling Price"  required>
                        </div>
                     </div>
                     <div class="row">
                                 <div class="form-group col-md-6">
                           <label >Product Image</label>
                           <input type="file" name="product_image" class="form-control" accept="image/* "class="upload" required onchange="readURL(this);" id="photo" >
                           <img id="image" src="#"/>
                        </div>
                   
                     </div>
                      
                      
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary"  style="float: right;">Submit</button>
                  </div>
               </form>
            </div>
            <!-- /.card -->
         </div>
         <!--/.col (left) -->
         <!-- right column -->
         <div class="col-md-6">
         </div>
         <!--/.col (right) -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
<script type="text/javascript">
   function readURL(input) {
      if (input.files && input.files[0]){
         var reader = new FileReader();
         reader.onload = function (e) {
            $('#image')
            .attr('src', e.target.result)
            .width(80)
            .height(80);
         };
         reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection