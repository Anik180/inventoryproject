@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Employee</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Update Employee</li>
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
         <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Update Employee</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form action="{{route('update.employee',$edit->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Name</label>
                           <input type="text" name="name" class="form-control" id="name" value="{{$edit->name}}" required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Email</label>
                           <input type="text" name="email" class="form-control" id="email" value="{{$edit->email}}" required="">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Phone</label>
                           <input type="number" name="phone" class="form-control" id="phone" value="{{$edit->phone}}" required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >City</label>
                           <input type="text" name="city" class="form-control" id="city" value="{{$edit->city}}" required="">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Experience</label>
                           <input type="text" name="experience" class="form-control" id="experience" value="{{$edit->experience}}" required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Nid No</label>
                           <input type="text" name="nid_no" class="form-control" id="nid_no" value="{{$edit->nid_no}}" required="">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label>Salary</label>
                           <input type="text" name="salary" class="form-control" id="salary" value="{{$edit->salary}}" required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Vacation</label>
                           <input type="text" name="vacation" class="form-control" id="vacation" value="{{$edit->vacation}}"  required="">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >New Photo</label>
                           <input type="file" name="photo" class="form-control" accept="image/* "class="upload" onchange="readURL(this);" id="photo" >
                           <img id="image" src="#"/>
                        </div>
                        <div class="form-group ">
                           <label >Old Photo</label>
                           <img src="{{URL::to($edit->photo)}}" name="old_image" style="height: 80px; width: 80px;">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Address</label>
                           <input type="textarea" name="address" class="form-control" id="Address" value="{{$edit->address}}"  required="" >
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