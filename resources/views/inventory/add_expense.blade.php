@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Expense</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Add Expense</li>
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
                  <h3 class="card-title">Add Expense</h3>
                  <div class="btn-group btn-group-toggle "  style="float: right;">
                  <label class="btn bg-olive active">
                    <a href="{{route('today.expense')}}" type="radio" name="options" id="option1" autocomplete="off" checked> Today</a>
                  </label>
                  <label class="btn bg-olive">
                    <a href="{{route('month.expense')}}" type="radio" name="options" id="option2" autocomplete="off"> This Month</a>
                  </label>
                  <label class="btn bg-olive">
                    <a href="{{route('yearly.expense')}}" type="radio" name="options" id="option3" autocomplete="off"> This Year</a>
                  </label>
                </div>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
            <form action="{{route('insert.expense')}}" method="post" >
                  @csrf
                  <div class="card-body">
             
                     
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label >Expense Amount</label>
                           <input type="text" name="expens_amount" class="form-control" id="expens_amount" placeholder="Enter Expense Amount" required>
                        </div>
                        <div class="form-group col-md-6">
                           <label>Expense Detail</label>
                           
                           <textarea class="form-control" name="expenses_detail" placeholder="Enter Expense Detail" id="expenses_detail" required></textarea>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           
                           <input type="hidden" name="month" class="form-control" id="month" value="{{ date("F") }}">
                        </div>
                        <div class="form-group col-md-6">
                           
                           <input type="hidden" name="date" class="form-control"  value="{{ date("d/m/y") }}">
                        </div>
                         <div class="form-group col-md-6">
                           
                           <input type="hidden" name="year" class="form-control" id="year"   value="{{ date("Y") }}">
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