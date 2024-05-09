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
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-sm-2"></div> 
                <div class="col-sm-8 card card-primary"> 
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
                  <form role="form" action="{{ route('banks.update',$bank->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{$bank->name}}" id="name" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Enter name"> 
                      </div>
                      <div class="form-group">
                        <label for="account_no">Account Number</label>
                        <input type="text" value="{{$bank->account_no}}" id="account_no" class="form-control @error('account_no') is-invalid @enderror" name="account_no"  placeholder="Enter Account Number"> 
                      </div>
                      <div class="form-group">
                        <label for="branch">Branch</label>
                        <input type="text" value="{{$bank->branch}}" id="branch" class="form-control @error('branch') is-invalid @enderror" name="branch"  placeholder="Enter branch "> 
                      </div>
                      <div class="form-group">
                        <label for="swift_code">Swift Code</label>
                        <input type="text" value="{{$bank->swift_code}}" id="swift_code" class="form-control @error('swift_code') is-invalid @enderror" name="swift_code"  placeholder="Enter Swift Code"> 
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" value="{{$bank->address}}" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Address here">
                      </div>  
                      <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control"> 
                          <option value="1" @if($bank->status == 1)
                            selected="selected"
                          @endif>Active</option> 
                          <option value="0" @if($bank->status == 0)
                            selected="selected"
                          @endif>In-Active</option> 
                        </select>
                      </div>  
                    </div>    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                  <div class="col-sm-2"></div>
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