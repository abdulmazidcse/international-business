@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Invoice</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <strong>SALES CONTACT: </strong>{{$orderList->invoice_number}}
                    <span class="float-right"> <strong>Status:</strong> Pending</span>

                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <div>
                                <strong>SALES CONTACT: </strong>{{$orderList->invoice_number}}
                            </div>
                            <div><strong>Date: </strong> {{date('d-m-Y', strtotime($orderList->order_date))}}</div>
                            <div><strong>EXPORTER: </strong> {{$orderList->company->name}}</div>
                            <div><strong>BENEFICIARY BANK: </strong> {{$orderList->bank->name}}</div>
                        </div>

                        <div class="col-sm-6">
                            <div>
                                <strong>IMPORTER: </strong> {{$orderList->customer->name}}
                            </div>
                            <div>
                                <strong>IMPORTER’S IEC NO: </strong> {{$orderList->importer_iec_no}}
                            </div>
                            <div>
                                <strong>MODE OF CARRYING: </strong> {{$orderList->mode->name}}
                            </div>
                            <div>
                                <strong>FINAL DESTINATION: </strong> {{$orderList->destination->name}}
                            </div>
                            <div>
                                <strong>LOADING PLACE: </strong> {{$orderList->loading->name}}
                            </div>
                        </div>



                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Products Code</th>
                                    <th>Description of Goods</th>
                                    <th>HS Code</th>
                                    <th>PCS IN BUNCH / CTN </th>
                                    <th>QUANTITY (PCS)</th>
                                    <th>TOTAL BUNCH / CTN </th>
                                    <th>WEIGHT/UNIT</th>
                                    <th>NET WT (KG)</th>
                                    <th>UNIT RATE </th>
                                    <th class="right"> TOTAL VALUE (USD)</th>
                                    <th class="center">GROSS WEIGHT</th>
                                    <th class="right">CBM-L</th>
                                    <th class="right">CBM-W</th>
                                    <th class="right">CBM-H</th>
                                    <th class="right">Carton CBM</th>
                                    <th class="right">CBM</th>
                                    <th class="right">Gross weight</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($orderDetails)
                                @php
                                // dd($orderDetails);
                                $i = 1;
                                $totalQty = 0;
                                $totalBunchCtn = 0;
                                $totalUsd = 0;
                                @endphp
                                @foreach ($orderDetails as $row)
                                  <tr role="row" class="odd">
                                      <td class="sorting_1" tabindex="0">{{ $i++ }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->product_code }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->description }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->hs_code }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->pcs_per_bunch }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->quantity }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->total_bunch }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->weight_per_unit }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->net_weight }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->unit_rate }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->total_value }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->gross_weight }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->cbm_length}} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->cbm_length}} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->cbm_height}} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->carton_cbm}} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->total_cbm}} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->total_gross_weight}} </td>
                                  </tr>

                                  @php
                                    $totalQty += $row->quantity_pcs;
                                    $totalBunchCtn += $row->total_bunch_ctn;
                                    $totalUsd += $row->total_value_usd;
                                  @endphp
                                  @endforeach
                                  <tr>
                                    <th class="center" colspan="5"><strong>Total</strong></th>
                                    <th>{{number_format($totalQty,2)}}</th>
                                    <th colspan="4">{{number_format($totalBunchCtn,2)}}</th>
                                    <th class="right">{{number_format($totalUsd,2)}}</th>
                                    <th colspan="4">&nbsp;</th>
                                </tr>
                                <tr>
                                    <td colspan="14" class="left"><strong>TERMS AND CONDITIONS : </strong></td>
                                </tr>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($terms as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td colspan="14" class="left">
                                        {{$row->description}}
                                    </td>
                                </tr>
                                @endforeach
                                  @endif
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>

        {{-- only Print --}}
        <div class="container" style="display: none;" id="printDiv">
            <div class="card">
                <div class="card-header">
                    <strong>SALES CONTACT: </strong>{{$orderList->invoice_number}}
                    <span class="float-right"> <strong>Status:</strong> Pending</span>

                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <div>
                                <strong>SALES CONTACT: </strong>{{$orderList->invoice_number}}
                            </div>
                            <div><strong>Date: </strong> {{date('d-m-Y', strtotime($orderList->order_date))}}</div>
                            <div><strong>EXPORTER: </strong> {{$orderList->company->name}}</div>
                            <div><strong>BENEFICIARY BANK: </strong> {{$orderList->bank->name}}</div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <strong>IMPORTER: </strong> {{$orderList->customer->name}}
                            </div>
                            <div>
                                <strong>IMPORTER’S IEC NO: </strong> {{$orderList->importer_iec_no}}
                            </div>
                            <div>
                                <strong>MODE OF CARRYING: </strong> {{$orderList->mode->name}}
                            </div>
                            <div>
                                <strong>FINAL DESTINATION: </strong> {{$orderList->destination->name}}
                            </div>
                            <div>
                                <strong>LOADING PLACE: </strong> {{$orderList->loading->name}}
                            </div>
                        </div> 
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr> 
                                    <th>Products Code</th>
                                    <th>Description of Goods</th>
                                    <th>HS Code</th>
                                    <th>PCS IN BUNCH / CTN </th>
                                    <th>QUANTITY (PCS)</th>
                                    <th>TOTAL BUNCH / CTN </th>
                                    <th>WEIGHT/UNIT</th>
                                    <th>NET WT (KG)</th>
                                    <th>UNIT RATE </th>
                                    <th class="right"> TOTAL VALUE (USD)</th>
                                    <th class="center">GROSS WEIGHT</th>
                                    <th class="right">CBM-L</th>
                                    <th class="right">CBM-W</th>
                                    <th class="right">CBM-H</th>
                                    <th class="right">Carton CBM</th>
                                    <th class="right">CBM</th>
                                    <th class="right">Gross weight</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($orderDetails)
                                @php
                                // dd($orderDetails);
                                $i = 1;
                                $totalQty = 0;
                                $totalBunchCtn = 0;
                                $totalUsd = 0;
                                @endphp
                                @foreach ($orderDetails as $row)
                                  <tr role="row" class="odd"> 
                                      <td class="sorting_1" tabindex="0">{{ $row->product_code }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->description }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->hs_code }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->pcs_per_bunch }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->quantity }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->total_bunch }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->weight_per_unit }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->net_weight }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->unit_rate }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->total_value }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->gross_weight }} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->cbm_length}} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->cbm_length}} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->cbm_height}} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->carton_cbm}} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->total_cbm}} </td>
                                      <td class="sorting_1" tabindex="0">{{ $row->total_gross_weight}} </td>
                                  </tr>

                                  @php
                                    $totalQty += $row->quantity_pcs;
                                    $totalBunchCtn += $row->total_bunch_ctn;
                                    $totalUsd += $row->total_value_usd;
                                  @endphp
                                  @endforeach
                                  <tr>
                                    <th class="center" colspan="5"><strong>Total</strong></th>
                                    <th>{{number_format($totalQty,2)}}</th>
                                    <th colspan="4">{{number_format($totalBunchCtn,2)}}</th>
                                    <th class="right">{{number_format($totalUsd,2)}}</th>
                                    <th colspan="4">&nbsp;</th>
                                </tr>
                                <tr>
                                    <td colspan="14" class="left"><strong>TERMS AND CONDITIONS : </strong></td>
                                </tr>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($terms as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td colspan="14" class="left">
                                        {{$row->description}}
                                    </td>
                                </tr>
                                @endforeach
                                  @endif
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
        {{-- only Print --}}
        <div class="row">
            <div class="col-sm-12 text-center">
                <button type="button" class="btn bg-red waves-effect" onclick="print()">
                    <i class="fas fa-print"></i>
                    <span>PRINT</span>
                </button>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection()
