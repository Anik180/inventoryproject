@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Product</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Update Product</li>
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
                  <h3 class="card-title">Update Product</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
            <form action="{{route('update.product',$edit->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Product Name</label>
                           <input type="text" name="product_name" class="form-control" id="product_name" value="{{ $edit->product_name }}" required>
                        </div>
                        <div class="form-group col-md-6">
                           <label >Category Name</label>
                           @php
                          $cat=DB::table('categories')->get(); 

                           @endphp
                           <select  class="form-control" name="category_id">
                           	<option disabled="" selected="">Select One</option>
                            @foreach($cat as $row)
                           	<option value="{{$row->id}}" <?php if($edit->category_id==$row->id) { echo "selected";} ?>>{{$row->category_name}}</option>
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
                           	<option value="{{$row->id}}" <?php if($edit->supplier_id==$row->id) { echo "selected";} ?>>{{$row->name}}</option>
                           	@endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label >Product Code</label>
                           <input type="text" name="product_code" class="form-control" id="product_code" value="{{ $edit->product_code }}" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Product Warehouse</label>
                           <input type="text" name="product_warehouse" class="form-control" id="product_warehouse" value="{{ $edit->product_warehouse }}" required>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="exampleInputPassword1">Product Route</label>
                           <input type="text" name="product_route" class="form-control" id="product_route" value="{{ $edit->product_route }}" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label>Buy Date</label>
                           <input type="date" name="buy_date" class="form-control" id="buy_date" value="{{ $edit->buy_date }}"  required>
                        </div>
                        <div class="form-group col-md-6">
                           <label >Expire Date</label>
                           <input type="text" name="expire_date" class="form-control" id="expire_date"   value="{{ $edit->expire_date }}"required>
                        </div>
                     </div>
                        <div class="row">
                  
                        <div class="form-group col-md-6">
                           <label >Buying Price</label>
                           <input type="text" name="buying_price" class="form-control" id="buying_price" placeholder="Enter Buying Price" value="{{ $edit->buying_price }}" required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Selling Price</label>
                           <input type="text" name="selling_price" class="form-control" id="selling_price" value="{{ $edit->selling_price }}"  required>
                        </div>
                     </div>

                       <div class="row">
                      <div class="form-group col-lg-6">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="product_image" name="product_image" >
                        <label class="custom-file-label" >Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <label for="exampleInputFile">Old Image</label><br>
                    <img src="{{URL::to($edit->product_image)}}" style="height: 40px;width: 70px;">
                    <input type="hidden" name="oldimage" value="{{$edit->product_image}}">
                  </div>
                  </div>
                      
                      
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-success"  style="float: right;">Update</button>
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