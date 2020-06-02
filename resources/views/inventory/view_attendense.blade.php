@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Attendence</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Attendence</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



{{-- datatble --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Attendence {{ $date->attendence_date }}</h3>
              <h3 class="card-title text-danger" style="float: right;">{{date('d/m/y')}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table {{-- id="example1" --}} class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL No</th>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Attendence</th>  
                </tr>
                </thead>
                <tbody>
                 
                @foreach($data as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->name}}</td>
                  <td><img src="{{URL::to($row->photo)}}" style="height: 80px; width: 80px;"></td>
                  <input type="hidden" name="id[]" value="{{ $row->id }}">
                  <td>
                  <input type="radio" name="attendence[{{ $row->id }}]" value="Present" disabled="" <?php if($row->attendence == 'Present'){
                    echo "checked";
                  } ?>>Present
                  <input type="radio" name="attendence[{{ $row->id }}]" value="Adsense" disabled="" <?php if($row->attendence == 'Adsense'){
                    echo "checked";
                  } ?>>adsense
                  </td>
                  <input type="hidden" name="attendence_date" value="{{ date('d/m/y') }}">
                  <input type="hidden" name="attendence_year" value="{{ date('Y') }}">
                </tr>
                @endforeach
               
                </tbody>
                <tfoot>
                <tr>
                  <th>SL No</th>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Attendence</th>
                </tr>
                </tfoot>
              </table>
           
                  
            </div>
            <!-- /.card-body -->
          </div>


     
    @endsection