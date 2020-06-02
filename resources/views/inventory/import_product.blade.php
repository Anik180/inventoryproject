@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Upload Product</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Upload Product</li>
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
                  <h3 class="card-title">Upload Product</h3>
                  <a href="{{route('export')}}" class="btn btn-danger" style="float: right;"><i class="fas fa-cloud-download-alt"></i>Download</a>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
            <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Upload Product</label>
                           <i class="fas fa-cloud-upload-alt"></i>
                           <input type="file"  name="import_file" class="form-control " id="import_file"  required>
                        </div>
                     
                     </div> 
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary"  style="float: right;"><i class="fas fa-cloud-upload-alt"></i>Upload</button>
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