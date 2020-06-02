@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">POS(Point Of Sell)</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active">POS</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<div class="row">
   <div class="col-md-6">
      <div class="card ">
         <div class="card-header">
            <h3 class="btn-group">      
               @foreach($cat as $row)
               <a class="btn btn-danger aligen-center active" href="javascript:void(0)" data-filter="all"> {{$row->category_name}} </a>
               @endforeach
            </h3>
         </div>
         <div class="card-body">
      
            <div>
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Product</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool">
                        </button>
                     </div>
                  </div>
                  <div class="card-body p-0">
                     <ul class="nav nav-pills flex-column">
                        <li class="nav-item active">
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Single Price</th>
                                    <th>Sub Total</th>
                                    <th>weight</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              @php
                              $cart_pro =Cart::content()
                              @endphp
                              <tbody>
                                 @foreach($cart_pro as $pro)
                                 <tr>
                                    <td>{{ $pro->name }}</td>
                                    <td>
                                       <form action="{{route('add.qty',$pro->rowId)}}" method="post">
                                          @csrf
                                          <input type="number" name="qty" value="{{ $pro->qty }}" style="width: 30px;">
                                          <button type="submit" class="btn btn-sm btn-success" style="margin-top: -2px;"><i class="fas fa-check"></i></button>
                                       </form>
                                    </td>
                                    <td>{{$pro->price}}</td>
                                    <td>{{$pro->price*$pro->qty}}</td>
                                    <td >
                                       <form action="{{route('add.weight',$pro->rowId)}}" method="post">
                                          @csrf
                                          <input type="number" name="weight" value="{{ $pro->weight }}" style="width: 30px;">
                                          <button type="submit" class="btn btn-sm btn-success" style="margin-top: -2px;"><i class="fas fa-check"></i></button>
                                       </form>
                                    </td>
                                    <td><a href="{{route('cart.delete',$pro->rowId)}}"><i class="fas fa-trash-alt"></a></td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </li>
                        <div  class="btn btn-primary btn-block mb-3">
                           <p>Quantity: <span>{{ Cart::count()}}</span></p>
                           <p>Sub Total: <span>{{ Cart::subtotal()}}</span></p>
                           <p>Vat: <span>{{Cart::tax()}}</span></p>
                           <hr>
                           <p>Total: <span>{{Cart::total()}}</span></p>
                        </div>
                     </ul>
                  </div>
                  <!-- /.card-body -->
                  
                  <form action="{{route('create.invoice')}}" method="post">
                     @csrf
                         <div class="panel">
                              @if ($errors->any())
                                <div class="alert alert-danger">
                                   <ul>
                                     @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                       @endforeach
                                     </ul>
                                  </div>
                                @endif
                             <h3 class="text-info">Select Customer
                             <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-default" style="float: right;">Add New</a>
                            </h3>
                           <select class="form-control" name="customer_id">
                              <option disabled="" selected="">Select Customer</option>
                              @foreach($customer as $cus)
                              <option value="{{ $cus->id }}">{{$cus->name}}</option>
                             @endforeach
                         </select>
                       <div class="card-footer">
                        <button type="submit" class="btn btn-primary"  style="float: right;">Create Invoice</button>
                     </div>
                     </div>
                   
                  </form>
               </div>
               <!-- /.card -->
               <!-- /.card -->
            </div>
         </div>
         <!-- /.card-body -->
      </div>
      <!-- /.card -->
   </div>
   <!-- /.col (left) -->
   <div class="col-md-6">
      <div class="card ">
         <div class="card">
            <div class="card-header card-primary">
               <h3 class="card-title">All Product</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered ta ble-striped">
                  <thead>
                     <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Code</th>
                        <th>Add</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($product as $row)
                     <tr>
                        <form action="{{ route('add.cart')}}" method="post">
                           @csrf
                           <input type="hidden" name="id" value="{{ $row->id }}">
                           <input type="hidden" name="name" value="{{ $row->product_name }}">
                           <input type="hidden" name="qty" value="1">
                           <input type="hidden" name="price" value="{{ $row->selling_price }}">
                           <input type="hidden" name="weight" value="0">
                           <td>
                              <img src="{{URL::to($row->product_image)}}" style="height: 80px; width: 80px;">
                           </td>
                           <td>{{$row->product_name}}</td>
                           <td>{{$row->category_name}}</td>
                           <td>{{$row->product_code}}</td>
                           <td><button type="submit" class="btn btninfo btn-sm"><i class="fas fa-plus-circle"></i></button></td>
                        </form>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <!-- /.card-body -->
         </div>
      </div>
      <!-- /.card -->
   </div>
   <!-- /.col (right) -->
</div>
<div class="modal fade" id="modal-default">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add New Customer</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{route('insert.customer')}}" method="post" enctype="multipart/form-data">
               @csrf
               @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
               <div class="card-body">
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label >Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required="">
                     </div>
                     <div class="form-group col-md-6">
                        <label >Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" required="">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter phone" required="">
                     </div>
                     <div class="form-group col-md-6">
                        <label >City</label>
                        <input type="text" name="city" class="form-control" id="city" placeholder="Enter city" required="">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label >Shop Name</label>
                        <input type="text" name="shopname" class="form-control" id="shopname" placeholder="Enter Shop Name" required="">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Account Holder</label>
                        <input type="text" name="account_holder" class="form-control" id="account_holder" placeholder="Emter Account Holder" required>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label>Account Number</label>
                        <input type="text" name="account_number" class="form-control" id="account_number" placeholder="Enter Account Number" required="">
                     </div>
                     <div class="form-group col-md-6">
                        <label >Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Enter Bank Name"  required="">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label >Bank Branch</label>
                        <input type="text" name="bank_branch" class="form-control" id="bank_branch" placeholder="Enter Bank Branch"  required="">
                     </div>
                     <div class="form-group col-md-6">
                        <label >Nid No</label>
                        <input type="text" name="nid_no" class="form-control" id="nid_no" placeholder="Enter Nid No"  required="">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label >Photo</label>
                        <input type="file" name="photo" class="form-control" accept="image/* "class="upload" required onchange="readURL(this);" id="photo" >
                        <img id="image" src="#"/>
                     </div>
                     <div class="form-group col-md-6">
                        <label >Address</label>
                        <textarea type="textarea" name="address" class="form-control" id="Address" placeholder="Enter Address"  required="" ></textarea>
                     </div>
                  </div>
               </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
         <button type="submit" class="btn btn-primary"  style="float: right;">Submit</button>
         </div>
         </form>
      </div>
   </div>
   <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<script type="text/javascript">
   function readURL(input) {
      if (input.files && input.files[0]){
         var reader = new FileReader();
         reader.onload = function (e) {
            $('#image')
            .attr('src', e.target.result)
            .width(80)
            .height(80);
         };
         reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection