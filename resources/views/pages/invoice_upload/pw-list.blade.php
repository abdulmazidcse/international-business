@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Packing & Weight</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Packing & Weight list</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Packing & Weight list</h3>
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
                                                    <th>Sl</th>
                                                    <th>Invoice No</th> 
                                                    <th>Exp No</th>
                                                    <th>Item Count</th>
                                                    <th>Invoice Date</th>
                                                    <th> Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                              @if($orderList)
                                              @foreach ($orderList as $row)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1" tabindex="0">{{ $i++ }} </td>
                                                    <td class="sorting_1" tabindex="0">{{ $row->order ? $row->order->invoice_number : '' }} </td>
                                                    <td class="sorting_1" tabindex="0">{{ $row->exp_no }} </td>
                                                    <td class="sorting_1" tabindex="0">{{ $row->items_count }} </td>
                                                    <td class="sorting_1" tabindex="0">{{ $row->order ? $row->order->order_date : '' }} </td>
                                                    <td >
                                                      <div class="btn-group btn-group-sm"> 
                                                        @if ( $row->tr_status !=1)
                                                        <a title="TR Invoice Generate" target="_blank" href="{{ url('tr-generate/' . $row->id) }}" class="btn btn-primary"><i class="fas fa-file-invoice-dollar"></i></a> 
                                                        @endif
                                                        <a title="Print Packing & Weight" target="_blank" href="{{ url('pw-print/' . $row->id) }}" class="btn btn-success"><i class="fas fa-print"></i></a> 
                                                         
                                                      </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr role="row">
                                                    <th>Sl</th>
                                                    <th>Invoice No</th> 
                                                    <th>Exp No</th>
                                                    <th>Item Count</th>
                                                    <th>Invoice Date</th>

                                                    <th> Action</th>
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
