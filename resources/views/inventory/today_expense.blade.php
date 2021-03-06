@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Today Expanse</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Today Expanse</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


@php

       $date=date("d/m/y");
        $tday=DB::table('expenses')->where('date',$date)->sum('expens_amount');

@endphp



         <div class="bg-gray py-0 px-3 mt-2">
                <h2 class="mb-0">
                  Total Expense
                <small style="float: right;">{{$tday}} TK </small>
                </h2>
               
              </div>
{{-- datatble --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Today Expanse</h3>
                               <div class="btn-group btn-group-toggle "  style="float: right;">
                  <label class="btn bg-olive ">
                    <a href="{{route('today.expense')}}" type="button" name="options" id="option1" autocomplete="off" > Today</a>
                  </label>
                  <label class="btn bg-info">
                    <a href="{{route('month.expense')}}" type="button" name="options" id="option2" autocomplete="off"> This Month</a>
                  </label>
                  <label class="btn bg-primary">
                    <a href="{{route('yearly.expense')}}" type="button" name="options" id="option3" autocomplete="off"> This Year</a>
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
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($today as $row)
                <tr>
                	
                  <td>{{$row->expens_amount}}</td>
                   <td>{{$row->expenses_detail}}</td>
    
                  <td>
                  	<a href="{{route('edit.expense',$row->id)}}" class="btn btn-info"><i class="far fa-edit"></i></a>
                  <a href="{{route('delete.expense',$row->id)}}" class="btn btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
                @endforeach
               
                </tbody>
                <tfoot>
                <tr>
                    
                  <th>Expens Amount</th> 
                  <th>Expenses Detail</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>


     
    @endsection