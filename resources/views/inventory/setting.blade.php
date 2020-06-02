@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Company Information</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Update Company Information</li>
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
                  <h3 class="card-title">Update Company Information</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form action="{{route('update.setting',$setting->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Company Name</label>
                           <input type="text" name="company_name" class="form-control" id="company_name" value="{{$setting->company_name}}" required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Company Address</label>
                           <input type="text" name="company_address" class="form-control" id="company_address" value="{{$setting->company_address}}" required="">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Company Email</label>
                           <input type="text" name="company_email" class="form-control" id="company_email" value="{{$setting->company_email}}" required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Company Phone</label>
                           <input type="text" name="company_phone" class="form-control" id="company_phone" value="{{$setting->company_phone}}" required="">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Company Mobile</label>
                           <input type="text" name="company_mobile" class="form-control" id="company_mobile" value="{{$setting->company_mobile}}" required="">
                        </div>
                              <div class="form-group col-md-6">
                           <label >Company Zipcode</label>
                           <input type="textarea" name="company_zipcode" class="form-control" id="company_zipcode" value="{{$setting->company_zipcode}}"  required="" >
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label>Company Country</label>
                           <input type="text" name="company_country" class="form-control" id="company_country" value="{{$setting->company_country}}" required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Company City</label>
                           <input type="text" name="company_city" class="form-control" id="company_city" value="{{$setting->company_city}}"  required="">
                        </div>

                     </div>
            {{--          <div class="row">
                        <div class="form-group col-md-6">
                           <label >Company New Photo</label>
                           <input type="file" name="company_logo" class="form-control" accept="image/* "class="upload" onchange="readURL(this);" id="photo" >
                           <img id="image" src="#"/>
                        </div>
                        <div class="form-group ">
                           <label >Company Old Photo</label>
                           <img src="{{URL::to($setting->company_logo)}}" name="old_image" style="height: 80px; width: 80px;">
                        </div>
                   
                     </div> --}}
                               <div class="row">
                      <div class="form-group col-lg-6">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="company_logo" name="company_logo" >
                        <label class="custom-file-label" >Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <label for="exampleInputFile">Old Image</label><br>
                    <img src="{{URL::to($setting->company_logo)}}" style="height: 40px;width: 70px;">
                    <input type="hidden" name="oldimage" value="{{$setting->company_logo}}">
                  </div>
                  </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary"  style="float: right;">Update</button>
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