@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Top Sheet</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Top Sheet Report</li>
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
                            <h3 class="card-title">Reports</h3>                                
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        @php
                                           $fiscalYears = fiscalYears('2020', '2024');
                                        @endphp 

                                        <div class="form-group col-md-4">
                                            <label for="exporter">Fiscal Year</label>
                                            <select name="exporter" id="exporter" class="form-control">
                                              <option value="">Fiscal Year </option>
                                              @foreach($fiscalYears as $fiscalYear)
                                              <option value="{{$fiscalYear}}" >{{$fiscalYear}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                         
                                        <?php    

                                        // Now $financial_years contains an array of financial years in the format "YYYY-YYYY"
 
                                            $month = strtotime('07');                                        
                                            $month_name = date('F', $month);
                                            echo  $month_name;
                                            echo '<br>';
                                            $month = strtotime('+1 month', $month); 
                                        

                                        ?>
                                    </div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                            role="grid" aria-describedby="example2_info">
                                            <thead>
                                                <tr>
                                                    <th>Month</th>
                                                    <th>Order ($)</th>
                                                    <th>Delivery ($)</th>
                                                    <th>Collection ($)</th>
                                                    <th>LC/TT In Hand ($)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @if($reports) 
                                              @foreach ($reports as $report)
                                              <tr>
                                                  <td>{{ $report['month'] }} </td>
                                                  <td>{{ number_format($report['sales_value'], 2) }}</td>
                                                  <td>{{ number_format($report['delivery'], 2) }}</td>
                                                  <td>{{ number_format($report['collection'], 2) }}</td>
                                                  <td>{{ number_format($report['lc_tt_in_hand'], 2) }}</td>
                                              </tr> 
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Sl</th>
                                                    <th rowspan="1" colspan="1">Name</th>
                                                    <th rowspan="1" colspan="1">Address</th> 
                                                    <th rowspan="1" colspan="1">Terms & conditions</th>
                                                    <th rowspan="1" colspan="1">Payment Terms</th>
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