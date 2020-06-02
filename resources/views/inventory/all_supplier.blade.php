@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">All Supplier</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


{{-- datatble --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Supplier</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Photo</th>  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all as $row)
                <tr>
                  <td>{{$row->name}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->phone}}</td>
                  <td>{{$row->address}}</td>
                 
                  <td><img src="{{URL::to($row->photo)}}" style="height: 80px; width: 80px;"></td>
                  <td>
                  	<a href="{{route('edit.supplier',$row->id)}}" class="btn btn-info"><i class="far fa-edit"></i></a>
                  	<a href="{{route('view.supplier',$row->id)}}" class="btn btn-success" ><i class="far fa-eye"></i></a>
                  <a href="{{route('delete.supplier',$row->id)}}" class="btn btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
                @endforeach
               
                </tbody>
                <tfoot>
                <tr>
               <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Photo</th>  
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>


     
    @endsection