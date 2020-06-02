@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employee Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('all.employee')}}">All Employee</a></li>
              <li class="breadcrumb-item active">Employee Profile</li>
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
                    <b>Experience</b> <a class="float-right">{{$view->experience}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Nid No</b> <a class="float-right">{{$view->nid_no}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Salary</b> <a class="float-right">{{$view->salary}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Vacation</b> <a class="float-right">{{$view->vacation}}</a>
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