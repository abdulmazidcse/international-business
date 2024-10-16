@extends('master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">INVOICE UPLOAD</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li> 
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
            <!-- /.card-header -->
            <div class="card-header">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                   {{ Session::get('success') }}
               </div>
               @endif
               @if (Session::has('error'))
                   <div class="alert alert-danger" role="alert">
                       {{ Session::get('error') }}
                   </div>
               @endif
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 card card-primary">
                  @if($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close close-error" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <form action="{{ route('invoice-upload.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="sales_contact">SALES CONTACT</label>
                    <input type="text" class="form-control" value="{{old('sales_contact')}}" name="sales_contact" id="sales_contact" placeholder="SEAL/ATIT/03/2023 (A)">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="sales_term">SALES TERM</label>
                    <select name="sales_term" id="sales_term" class="form-control">
                      <option value="" >Select Sales Term </option>
                      @foreach($salesTerms as $term)
                      <option value="{{$term->name}}" {{ old('sales_term') == $term->name ? 'selected' : '' }}>{{$term->name}}</option>
                      @endforeach
                    </select> 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="country">COUNTRY OF ORIGIN</label>
                    <select name="country" id="country" class="form-control">
                      <option value="" >Select Country </option>
                      @foreach($country as $row)
                      <option value="{{$row->id}}" {{ old('country') == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="exporter">Date</label>
                    <input type="date"  name="order_date" id="date"class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter">EXPORTER</label>
                    <select name="exporter" id="exporter" class="form-control">
                      <option value="">Select Exporter </option>
                      @foreach($exporter as $row)
                      <option value="{{$row->id}}" {{ old('exporter') == $row->id ? 'selected' : '' }} >{{$row->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">IMPORTER</label>
                    <select name="importer"  id="importer" class="form-control">
                      <option value="">Select Importer </option>
                      @foreach($importer as $row)
                      <option value="{{$row->id}}" {{ old('importer') == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputAddress2">BENEFICIARY BANK:</label>
                    <select name="bank"  id="bank" class="form-control">
                        <option value="">Select Bank </option>
                        @foreach($bank as $row)
                        <option value="{{$row->id}}" {{ old('bank') == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputAddress2">IMPORTER’S IEC NO:</label>
                    <input type="text" value="{{old('importer_iec_no')}}" class="form-control" name="importer_iec_no" id="importer_iec_no" placeholder="IMPORTER’S IEC NO">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="pan_no">PAN NO:</label>
                    <input type="text" value="{{old('pan_no')}}" name="pan_no" class="form-control" id="pan_no" placeholder="PAN NO">
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="port_discharge_id">Port of Discharged: </label>
                        <select name="port_discharge_id"  id="port_discharge_id" class="form-control">
                            <option  value="" >Select Discharged </option>
                            @foreach($discharged as $row)
                            <option value="{{$row->id}}" {{ old('port_discharge_id') == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                            @endforeach
                          </select>
                      </div>
                  <div class="form-group col-md-3">
                    <label for="mode_of_carrying">MODE OF CARRYING: </label>
                    <select name="mode_of_carrying"  id="mode_of_carrying" class="form-control">
                        <option value="">Select Mode of Carrying</option>
                        @foreach($modes as $row)
                        <option value="{{$row->id}}"  {{ old('mode_of_carrying') == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group col-md-3">
                    <label for="destination">FINAL DESTINATION:</label>
                        <select name="destination"  id="destination" class="form-control">
                            <option value="">Select Destination </option>
                            @foreach($destinations as $row)
                            <option value="{{$row->id}}" {{ old('destination') == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                            @endforeach
                      </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="loading_place">LOADING PLACE::</label>
                    <select name="loading_place"  id="loading_place" class="form-control">
                        <option value="">Select Loading Place </option>
                        @foreach($loading_places as $row)
                        <option value="{{$row->id}}" {{ old('loading_place') == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                        @endforeach
                  </select>
                  </div>

                </div>
                <div class="form-group">
                  <label for="file">Invoice file upload</label>
                  <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>

            </div>
            <!-- /.card-body -->

          </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  @endsection()
