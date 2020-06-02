@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Invoice</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">Invoice</li>
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
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


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
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Name:</b> {{$customer->name}}<br>
                  <b>Address:</b> {{$customer->address}}<br>
                  <b>City:</b>{{$customer->city}}<br>
                  <b>Phone:</b>{{$customer->phone}}<br>
                   <b>Shop Name:</b>{{$customer->shopname}}<br>
                </div>
                <!-- /.col -->
         
                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order Date:</b> {{date('d/m/y')}}<br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
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
                      <th>Name</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>weight</th>
                      <th>Total</th>
                     
                    </tr>
                    </thead>
                    <tbody>
             @php
                 $sl=1;
             @endphp

                    @foreach($content as $row)
                    <tr>
                      <td>{{$sl++}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->qty}}</td>
                      <td>{{$row->price}}</td>
                      <td>{{$row->weight}}</td>
                      <td>{{$row->price*$row->qty}}</td>
                    </tr>
                   @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
     
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{Cart::subtotal()}}</td>
                      </tr>
                      <tr>
                        <th>Tax</th>
                        <td>{{Cart::tax()}}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>{{Cart::total()}}</td>
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
                  <button type="submit" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default"><i class="far fa-credit-card"></i> Submit
                  </button>
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







<div class="modal fade" id="modal-default">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Invoice of {{ $customer->name }}</h4>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <h4 class="text-danger modal-title">Total:{{Cart::total()}} </h4>
         <div class="modal-body">
            <form action="{{route('main.invoice')}}" method="post">
               @csrf
               <div class="card-body">
                  
                     <div class="form-group ">
                        <label >Payment</label>
                        <select class="form-control" name="payment_status">
                         <option value="Cash">Cash</option>
                         <option value="check">check </option>
                         <option value="Due">Due</option>

                        </select>
                     </div>
                     <div class="form-group">
                        <label >Pay</label>
                        <input type="text" name="pay" class="form-control" id="pay"  required="">
                     </div>
                  
                 
                     <div class="form-group ">
                        <label for="exampleInputEmail1">Due</label>
                        <input type="text" name="due" class="form-control" id="due" required="">
                     </div>

                     <input type="hidden" name="customer_id" value=" {{ $customer->id }} ">
                     <input type="hidden" name="order_date" value=" {{ date('d/m/y') }} ">
                     <input type="hidden" name="order_status" value="pending">
                     <input type="hidden" name="total_product" value=" {{ Cart::count() }} ">
                     <input type="hidden" name="sub_total" value=" {{ Cart::subtotal() }} ">
                     <input type="hidden" name="vat" value=" {{ Cart::tax() }} ">
                     <input type="hidden" name="total" value=" {{ Cart::total() }} ">
                   
        
               </div>
         <div class="card-footer">
         <button type="submit" class="btn btn-primary"  style="float: right;">Payment Submit</button>
         </div>
         </form>
         </div>
         <!-- /.card-body -->
         
      </div>
   </div>
   <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
@endsection