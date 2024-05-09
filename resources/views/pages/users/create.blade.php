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
              <h3 class="card-title">User roles create</h3>  
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
                  <form role="form" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputName">Name</label> 
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" name="name" value="{{ old('name') }}" placeholder="Enter name"> 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" name="email" value="{{ old('email') }}" placeholder="Enter name"> 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" name="password" placeholder="Enter name"> 
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputCPassword">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputCPassword" name="password_confirmation" placeholder="Enter name"> 
                      </div> 
                      <div class="form-group">
                        <label>Role Select</label>
                        <select class="custom-select @error('role') is-invalid @enderror" name="role">
                          <option value="">Select role </option>
                          @foreach ( $roles as $role )
                          <option value="{{$role->name}}" @if(old('role') == $role->name) selected="selected" @endif > {{ $role->name }} </option>
                          @endforeach
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