@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Authentication</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            User role create </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Bank create</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <button type="button" class="close close-error" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form role="form" action="{{ route('customer.store') }}" method="POST">
                                @csrf 
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" value="{{old('name')}}"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" value="{{old('address')}}"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" id="account_no" value="{{old('account_no')}}"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                name="phone_number" placeholder="Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="terms_and_conditions">Terms & conditions</label>
                                            <input type="text" id="terms_and_conditions" value="{{old('terms_and_conditions')}}"
                                                class="form-control @error('terms_and_conditions') is-invalid @enderror"
                                                name="terms_and_conditions" placeholder="Enter terms & conditions ">
                                        </div>
                                        <div class="form-group">
                                            <label for="payment_terms">Payment Terms</label>
                                            <input type="text" id="payment_terms" value="{{old('payment_terms')}}"
                                                class="form-control @error('payment_terms') is-invalid @enderror"
                                                name="payment_terms" placeholder="Enter Payment Terms">
                                        </div> 
                                    </div> 
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="card-body"> 
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select name="country_id"  id="country" class="form-control @error('country_id') is-invalid @enderror">
                                              <option value="">Select Country </option>
                                              @foreach($country as $row)
                                              <option value="{{$row->id}}" {{ old('country_id') == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                                              @endforeach
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                          <label for="mode_of_carrying">Mode of Carrying: </label>
                                          <select name="mode_of_carrying"  id="mode_of_carrying" class="form-control @error('mode_of_carrying') is-invalid @enderror">
                                              <option value="">Select Mode of Carrying</option>
                                              @foreach($modes as $row)
                                              <option value="{{$row->id}}" {{ old('mode_of_carrying') == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                                              @endforeach
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <label for="port_discharge">Port of Discharged</label>
                                            <select name="port_discharge"  id="port_discharge" class="form-control @error('port_discharge') is-invalid @enderror">
                                              <option value="">Select Discharged </option>
                                              @foreach($discharged as $row)
                                              <option value="{{$row->id}}" {{ old('port_discharge') == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                                              @endforeach
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                          <label for="final_destination">Final Destination:</label>
                                          <select name="final_destination"  id="final_destination" class="form-control @error('final_destination') is-invalid @enderror">
                                              <option value="" >Select Destination </option>
                                              @foreach($destinations as $row)
                                              <option value="{{$row->id}}" {{ old('final_destination') == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                                              @endforeach
                                        </select>
                                        </div> 
                                        <div class="form-group">
                                          <label for="loading_place">Loading Place:</label>
                                          <select name="loading_place"  id="loading_place" class="form-control @error('final_destination') is-invalid @enderror">
                                              <option value="">Select Loading Place </option>
                                              @foreach($loading_places as $row)
                                              <option value="{{$row->id}}" {{ old('loading_place') == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                                              @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div> 
                                  </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection()
