@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Order</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Order</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
@php
$invoice=DB::table('settings')->first();
@endphp
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
       {{--      <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> --}}


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{$invoice->company_name}}
                    <small class="float-right">Date: {{date('d/m/y')}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
              <div class="col-sm-6 invoice-col">
                 
                  <br>
                  <b>Name:</b> {{$order->name}}<br>
                  <b>Address:</b> {{$order->address}}<br>
                  <b>City:</b>{{$order->city}}<br>
                  <b>Phone:</b>{{$order->phone}}<br>
                   <b>Shop Name:</b>{{$order->shopname}}<br>
                </div>
                <!-- /.col -->
         
                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                
                  <br>
                  <b>Order Date:</b> {{$order->order_date}}<br>
                  <b>Order Status:</b><span class="badge badge-warning">{{$order->order_status}}</span><br>
                  <b>Order Id:</b> {{$order->id}}<br>
                  
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>SL No</th>
                      <th>Product Name</th>
                      <th>Product Code</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>weight</th>
                      <th>Total</th>
                     
                    </tr>
                    </thead>
                    <tbody>
             @php
                 $sl=1;
             @endphp

                    @foreach($orders_details as $row)
                    <tr>
                      <td>{{$sl++}}</td>
                      <td>{{$row->product_name}}</td>
                      <td>{{$row->product_code}}</td>
                      <td>{{$row->quantity}}</td>
                      <td>{{$row->unitcost}}</td>
                      <td>{{$row->weight}}</td>
                      <td>{{$row->unitcost*$row->quantity}}</td>
                    </tr>
                   @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
              <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment By:</p>
                  <h4>{{$order->payment_status}}</h4>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   <p class="lead">Pay Amount:<b>{{$order->pay}}</b></p>
                   <p class="lead">Due Amount:<b>{{$order->due}}</b></p>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{$order->sub_total}}</td>
                      </tr>
                      <tr>
                        <th>Tax</th>
                        <td>{{$order->vat}}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>{{$order->total}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
          
              <div class="row no-print">
                <div class="col-12">
                  <a onclick="window.print()" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                    @if($order->order_status == 'Success')
                   @else
                  <a href="{{route('confirm.order',$order->id)}}" type="submit" class="btn btn-success float-right" >Confirm
                  </a>
                  @endif
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



@endsection