@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Signature Upload</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Signature Upload list</li>
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
                            <h3 class="card-title">Signature Upload list</h3>
                            <a href="{{ route('signature.create') }}" class="float-right"><i class="fas fa-create"></i>
                                Create New Signature Upload</a>

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
                                                    <th class="sorting_desc" aria-sort="descending">Sl</th>
                                                    <th class="sorting_desc" aria-sort="descending">Name</th>
                                                    <th class="sorting_desc" aria-sort="descending">Designation</th>
                                                    <th class="sorting_desc" aria-sort="descending">Signature File</th>
                                                    <th class="sorting_desc" aria-sort="descending">Status</th>
                                                    <th class="sorting">
                                                        Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if ($signatures)
                                                    @foreach ($signatures as $signature)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1" tabindex="0">{{ $signature->id }} </td>
                                                            <td class="sorting_1" tabindex="0">{{ $signature->name }}
                                                            </td>
                                                            <td class="sorting_1" tabindex="0">
                                                                {{ $signature->designation }} </td>
                                                            <td class="sorting_1" tabindex="0">
                                                                <img width="100" src="{{ Storage::url($signature->signature) }}" alt="Signature">
                                                            </td>
                                                            <td class="sorting_1" tabindex="0">{{ $signature->status }}
                                                            </td>
                                                            <td>
                                                                <div class="btn-group btn-group-sm">
                                                                    <a href="{{ route('signature.edit', $signature->id) }}"
                                                                        class="btn btn-warning"><i
                                                                            class="fas fa-edit"></i></a>

                                                                    <form
                                                                        action="{{ route('signature.destroy', $signature->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <a href="javascript:;"
                                                                            onclick="return confirm('are you sure you want to delete?')">
                                                                            <button type="submit" class="btn bg-red "
                                                                                title="Click To Delete"><i
                                                                                    class="fas fa-trash"></i></button>
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
                                                    <th rowspan="1" colspan="1">Name</th>
                                                    <th rowspan="1" colspan="1">Designation</th>
                                                    <th rowspan="1" colspan="1">Signature File</th>
                                                    <th rowspan="1" colspan="1">Status</th>
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
