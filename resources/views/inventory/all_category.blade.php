@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">All Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
{{-- datatble --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Category</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                	<th>SL No</th>
                  <th>Category Name</th> 
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all as $row)
                <tr>
                	 <td>{{$row->id}}</td>
                  <td>{{$row->category_name}}</td>
    
                  <td>
                  	<a href="{{route('edit.category',$row->id)}}" class="btn btn-info"><i class="far fa-edit"></i></a>
                  <a href="{{route('delete.category',$row->id)}}" class="btn btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
                @endforeach
               
                </tbody>
                <tfoot>
                <tr>
                	<th>SL No</th>
                  <th>Name</th>  
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>


     
    @endsection