@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pay Salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Pay Salary</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


{{-- datatble --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pay Salary</h3> <span class="card-title" style="float: right;">{{date("F Y")}}</span>

              

            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Salary</th>
                  <th>Month</th>
                  {{-- <th>Year</th> --}}
                  <th>Advanced Salary</th>  
                  <th >Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employee as $row)
                <tr>
                  <td>{{$row->name}}</td>
                  <td><img src="{{URL::to($row->photo)}}" style="height: 80px; width: 80px;"></td>
                  <td>{{$row->salary}}</td>
                <td><span class="badge badge-success">{{ date("F",strtotime('-1 months')) }}</span></td>
                   {{--  <td>{{$row->year}}</td> --}}
                  <td></td>
                  <td>
                  	<a href="" class="btn btn-info center-block"><i class="fas fa-hand-point-right">Pay Now</i></a>
             
                  </td>
                </tr>
                @endforeach
               
                </tbody>
                <tfoot>
                <tr>
                   <th>Name</th>
                  <th>Photo</th>
                  <th>Salary</th>
                   <th>Month</th>
                  {{--<th>Year</th>  --}}
                  <th>Advanced Salary</th> 
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>


     
    @endsection