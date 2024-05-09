@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Final Destinations</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Final Destinations list</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Final Destination list</h3>
                            <a href="{{ route('destinations.create') }}" class="float-right"><i class="fas fa-create"></i> Create New Destination</a>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                            role="grid" aria-describedby="example2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_desc" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Rendering engine: activate to sort column ascending"
                                                        aria-sort="descending">Sl</th>
                                                    <th class="sorting_desc" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Rendering engine: activate to sort column ascending"
                                                        aria-sort="descending">Destination Address</th> 
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @if($destinations)
                                              @foreach ($destinations as $destination)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1" tabindex="0">{{ $destination->id }} </td>
                                                    <td class="sorting_1" tabindex="0">{{ $destination->name }} </td> 
                                                    <td >
                                                      <div class="btn-group btn-group-sm">
                                                        <a href="{{ route('destinations.edit', $destination->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                         
                                                        <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="javascript:;" onclick="return confirm('are you sure you want to delete?')">                                                        
                                                            <button type="submit" class="btn bg-red " title="Click To Delete"><i class="fas fa-trash"></i></button>
                                                            </a>                                                
                                                        </form> 
                                                      </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Sl</th>
                                                    <th rowspan="1" colspan="1">Destination Address</th> 
                                                    <th rowspan="1" colspan="1">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection()
