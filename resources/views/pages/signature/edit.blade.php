@extends('master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Final Signature Upload</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"> 
              Signature Upload </li>
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
              <h3 class="card-title">Signature Upload Create</h3>  
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
                  <form role="form" action="{{ route('signature.update', $signatures->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT') 
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" value="{{  $signatures->name }}" id="name"
                              class="form-control @error('name') is-invalid @enderror" name="name"
                              placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                          <label for="name">Designation</label>
                          <input type="text" value="{{  $signatures->designation }}" id="designation"
                              class="form-control @error('designation') is-invalid @enderror"
                              name="designation" placeholder="Enter Designation">
                      </div>
                      <div class="form-group">
                          
                          <label for="name">Signature</label>
                          <input type="file" id="signature-file"
                              class="form-control @error('signature-file') is-invalid @enderror" name="signature-file">
                              @if ($signatures->signature)
                              <img width="100" src="{{ Storage::url($signatures->signature) }}" alt="Signature">
                              @endif
                      </div>
                      <div class="form-group">
                          <label for="status">Status</label>
                          <select name="status" id="status" class="form-control"> 
                            <option value="1" @if($signatures->status == 1)
                              selected="selected"
                            @endif>Active</option> 
                            <option value="0" @if($signatures->status == 0)
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