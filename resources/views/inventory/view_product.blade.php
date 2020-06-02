@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('all.product')}}">All Product</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="col-12">
                <img src="{{URL::to($prod->product_image)}}" class="product-image" alt="Product Image">
              </div>
     
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$prod->product_name}}</h3>
              <hr>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Category Name</b> <a class="float-right">{{$prod->category_name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Supplier Name</b> <a class="float-right">{{$prod->name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Product Code</b> <a class="float-right">{{$prod->product_code}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Product Warehouse</b> <a class="float-right">{{$prod->product_warehouse}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Product Route</b> <a class="float-right">{{$prod->product_route}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Buy Date</b> <a class="float-right">{{$prod->buy_date}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Expire Date</b> <a class="float-right">{{$prod->expire_date}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Buying Price</b> <a class="float-right">{{$prod->buying_price}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Selling Price</b> <a class="float-right">{{$prod->selling_price}}</a>
                  </li>
                </ul>
      </div>
      <!-- /.card -->

    </section>
    @endsection