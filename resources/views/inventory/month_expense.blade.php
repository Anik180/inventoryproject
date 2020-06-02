@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{date('Y')}} All Expanse</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">{{date('Y')}} All Expanse</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div>
  <a class="btn btn-primary" href="{{route('January.expense')}}" role="button">January</a>
  <a class="btn btn-primary" href="{{route('February.expense')}}" role="button">February</a>
  <a class="btn btn-primary" href="{{route('March.expense')}}" role="button">March</a>
  <a class="btn btn-primary" href="{{route('April.expense')}}" role="button">April</a>
  <a class="btn btn-primary" href="{{route('May.expense')}}" role="button">May</a>
  <a class="btn btn-primary" href="{{route('June.expense')}}" role="button">June</a>
  <a class="btn btn-primary" href="{{route('July.expense')}}" role="button">July</a>
  <a class="btn btn-primary" href="{{route('August.expense')}}" role="button">August</a>
  <a class="btn btn-primary" href="{{route('September.expense')}}" role="button">September</a>
  <a class="btn btn-primary" href="{{route('October.expense')}}" role="button">October</a>
  <a class="btn btn-primary" href="{{route('November.expense')}}" role="button">November</a>
  <a class="btn btn-primary" href="{{route('December.expense')}}" role="button">December</a>
</div>



@php

      $month=date("F");
      $mon=DB::table('expenses')->where('month',$month)->sum('expens_amount');

@endphp
         <div class="bg-gray py-0 px-3 mt-2">
                <h2 class="mb-0">
                  Total Expense {{date('F')}}
                <small style="float: right;">{{$mon}} TK </small>
                </h2>
              </div>
{{-- datatble --}}
          <div class="card">
            <div class="card-header">

              <h3 class="card-title">{{-- {{date('F')}} --}} Monthly Expanse</h3>
                               <div class="btn-group btn-group-toggle "  style="float: right;">
                  <label class="btn bg-olive ">
                    <a href="{{route('today.expense')}}" type="radio" name="options" id="option1" autocomplete="off" > Today</a>
                  </label>
                  <label class="btn bg-info">
                    <a href="{{route('month.expense')}}" type="radio" name="options" id="option2" autocomplete="off"> This Month</a>
                  </label>
                  <label class="btn bg-primary">
                    <a href="{{route('yearly.expense')}}" type="radio" name="options" id="option3" autocomplete="off"> This Year</a>
                  </label>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Expens Amount</th> 
                  <th>Expenses Detail</th> 
                  <th>Date</th> 
                </tr>
                </thead>
                <tbody>
                @foreach($monthly as $row)
                <tr>
                  <td>{{$row->expens_amount}}</td>
                   <td>{{$row->expenses_detail}}</td>
                   <td>{{$row->date}}</td>
                </tr>
                @endforeach
               
                </tbody>
                <tfoot>
                <tr>  
                  <th>Expens Amount</th> 
                  <th>Expenses Detail</th>
                  <th>Date</th> 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>


     
    @endsection