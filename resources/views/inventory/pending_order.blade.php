@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Pending Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">All Pending Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


{{-- datatble --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Pending Order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Date</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Payment Status</th>
                  <th>Order Status</th>  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pending as $row)
                <tr>
                  <td>{{$row->name}}</td>
                  <td>{{$row->order_date}}</td>
                  <td>{{$row->total_product}}</td>
                  <td>{{$row->total}}</td>
                  <td>{{$row->payment_status}}</td>
                  <td><span class="badge badge-warning">{{$row->order_status}}</span></td>
                  <td>
                  	<a href="{{route('view.order',$row->id)}}" class="btn btn-success" ><i class="far fa-eye"></i></a>
                  </td>
                </tr>
                @endforeach
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Customer Name</th>
                  <th>Date</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Payment Status</th>
                  <th>Order Status</th>  
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>


     
    @endsection