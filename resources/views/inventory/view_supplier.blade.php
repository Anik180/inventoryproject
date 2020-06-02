@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Supplier Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('all.supplier')}}">All Supplier</a></li>
              <li class="breadcrumb-item active">Supplier Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="row">
 <div class="col-lg-6 offset-lg-3 shadow p-3 mb-5 bg-light rounded">
                    <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{URL::to($view->photo)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$view->name}}</h3>

                <p class="text-muted text-center">{{$view->email}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{$view->phone}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>address</b> <a class="float-right">{{$view->address}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Shop Name</b> <a class="float-right">{{$view->shop}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Supplier Type</b> <a class="float-right">{{$view->type}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Account Holder</b> <a class="float-right">{{$view->account_holder}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Account Number</b> <a class="float-right">{{$view->account_number}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Bank Name</b> <a class="float-right">{{$view->bank_name}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Branch Name</b> <a class="float-right">{{$view->branch_name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>City</b> <a class="float-right">{{$view->city}}</a>
                  </li>
                </ul>

                
              </div>
              <!-- /.card-body -->
            </div>
</div>
</div>
    @endsection