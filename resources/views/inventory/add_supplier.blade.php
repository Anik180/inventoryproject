@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Supplier</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Add Supplier</li>
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
                  <h3 class="card-title">Add Supplier</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
            <form action="{{route('insert.supplier')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Name</label>
                           <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Email</label>
                           <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" required="">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="exampleInputEmail1">Phone</label>
                           <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter phone" required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >City</label>
                           <input type="text" name="city" class="form-control" id="city" placeholder="Enter city" required="">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label > Supplier Type</label>
                       <select class="form-control" name="type">
                           <option disabled="" selected="">Select One</option>
                          <option value="Distributor">Distributor</option>
                          <option value="Whole Seller">Whole Seller</option>
                          <option value="broker">broker</option>
                       </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="exampleInputPassword1">Account Holder</label>
                           <input type="text" name="account_holder" class="form-control" id="account_holder" placeholder="Emter Account Holder" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label>Account Number</label>
                           <input type="text" name="account_number" class="form-control" id="account_number" placeholder="Enter Account Number" required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Bank Name</label>
                           <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Enter Bank Name"  required="">
                        </div>
                     </div>
                        <div class="row">
                  
                        <div class="form-group col-md-6">
                           <label >Bank Branch</label>
                           <input type="text" name="branch_name" class="form-control" id="branch_name" placeholder="Enter Bank Branch"  required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Shop Name</label>
                           <input type="text" name="shop" class="form-control" id="shop" placeholder="Enter Shop"  required="">
                        </div>
                     </div>
                     <div class="row">
                                 <div class="form-group col-md-6">
                           <label >Photo</label>
                           <input type="file" name="photo" class="form-control" accept="image/* "class="upload" required onchange="readURL(this);" id="photo" >
                           <img id="image" src="#"/>
                        </div>
                       <div class="form-group col-md-6">
                           <label >Address</label>
                           <textarea type="textarea" name="address" class="form-control" id="Address" placeholder="Enter Address"  required="" ></textarea>
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