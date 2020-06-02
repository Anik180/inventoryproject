@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Advanced Salary</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Add Advanced Salary</li>
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
                  <h3 class="card-title">Add Advanced Salary</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
            <form action="{{route('insert.advanced_salary')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Employee Name</label>
                          @php
                          $emp=DB::table('employees')->get();
                          @endphp
                          <select name="employee_id" class="form-control">
                          	@foreach($emp as $row)
                          	<option value="{{$row->id }}">{{$row->name }}</option>
                          	@endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label >Month</label>
                           <select class="form-control" name="month">
                           <option disabled="" selected="">Select One</option>
                          <option value="January">January</option>
                          <option value="February">February</option>
                          <option value="March">March</option>
                          <option value="April">April</option>
                          <option value="May">May</option>
                          <option value="June">June</option>
                          <option value="July">July</option>
                          <option value="August">August</option>
                          <option value="September">September</option>
                          <option value="October">October</option>
                          <option value="November">November</option>
                          <option value="December">December</option>
                       </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Year</label>
                           <input type="text" name="year" class="form-control" id="year" placeholder="Enter Year" required="">
                        </div>
                        <div class="form-group col-md-6">
                           <label >Advanced Salary</label>
                           <input type="text" name="advanced_salary" class="form-control" id="advanced_salary" placeholder="Enter Advanced Salary" required="">
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

@endsection