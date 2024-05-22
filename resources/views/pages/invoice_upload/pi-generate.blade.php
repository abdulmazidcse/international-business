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
                    <strong>SALES CONTACT: </strong>{{ $orderList->invoice_number }}
                    <span class="float-right"> <strong>Status:</strong> Pending</span>

                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <div>
                                <strong>SALES CONTACT: </strong>{{ $orderList->invoice_number }}
                            </div>
                            <div><strong>Date: </strong> {{ date('d-m-Y', strtotime($orderList->order_date)) }}</div>
                            <div><strong>EXPORTER: </strong> {{ $orderList->company->name }}</div>
                            <div><strong>BENEFICIARY BANK: </strong> {{ $orderList->bank->name }}</div>
                        </div>

                        <div class="col-sm-6">
                            <div>
                                <strong>IMPORTER: </strong> {{ $orderList->customer->name }}
                            </div>
                            <div>
                                <strong>IMPORTER’S IEC NO: </strong> {{ $orderList->importer_iec_no }}
                            </div>
                            <div>
                                <strong>MODE OF CARRYING: </strong> {{ $orderList->mode->name }}
                            </div>
                            <div>
                                <strong>FINAL DESTINATION: </strong> {{ $orderList->destination->name }}
                            </div>
                            <div>
                                <strong>LOADING PLACE: </strong> {{ $orderList->loading->name }}
                            </div>
                        </div>



                    </div>
                    <form action="{{ route('generate-pi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                    <th class="right">Check All <input type="checkbox" name="all" class="all-checkbox"
                                            id="checkAll"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($orderDetails)
                                    @php
                                        // dd($orderDetails);
                                        $i = 1;
                                        $totalQty = 0;
                                        $totalBunchCtn = 0;
                                        $totalUsd = 0;
                                    @endphp
                                    @foreach ($orderDetails as $row)
                                    <input type="hidden" name="piid[{{$row->id}}]" value="{{$row->id}}">
                                        <tr role="row" class="odd">
                                            <td>{{ $i++ }} </td>
                                            <td>{{ $row->product_code }} </td>
                                            <td>{{ $row->description }} </td>
                                            <td>{{ $row->hs_code }} </td>
                                            <td>{{ $row->pcs_per_bunch }} </td>
                                            <td>{{ $row->quantity }} </td>
                                            <td>{{ $row->total_bunch }} </td>
                                            <td>{{ $row->weight_per_unit }} </td>
                                            <td>{{ $row->net_weight }} </td>
                                            <td>{{ $row->unit_rate }} </td>
                                            <td>{{ $row->total_value }} </td>
                                            <td>{{ $row->gross_weight }} </td>
                                            <td>{{ $row->cbm_length }} </td>
                                            <td>{{ $row->cbm_length }} </td>
                                            <td>{{ $row->cbm_height }} </td>
                                            <td>{{ $row->carton_cbm }} </td>
                                            <td>{{ $row->total_cbm }} </td>
                                            <td>{{ $row->total_gross_weight }} </td>
                                            <td> <input type="checkbox" value="{{$row->id}}" name="pi-selected[{{$row->id}}]">
                                            </td>
                                        </tr>

                                        @php
                                            $totalQty += $row->quantity_pcs;
                                            $totalBunchCtn += $row->total_bunch_ctn;
                                            $totalUsd += $row->total_value_usd;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <th class="center" colspan="5"><strong>Total</strong></th>
                                        <th>{{ number_format($totalQty, 2) }}</th>
                                        <th colspan="4">{{ number_format($totalBunchCtn, 2) }}</th>
                                        <th class="right">{{ number_format($totalUsd, 2) }}</th>
                                        <th colspan="4">&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <td colspan="14" class="left"><strong>TERMS AND CONDITIONS : </strong></td>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                @endif
                            </tbody>

                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn bg-red waves-effect">
                               submit
                            </button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
        
    </section>
    <!-- /.content -->
@endsection()
@section('script')
    <script>
        // $("#checkAll").change(function() {
        //     if (!$('input:checkbox').is('checked')) {
        //         $('input:checkbox').prop('checked', true);
        //     } else {
        //         $('input:checkbox').prop('checked', false);
        //     }
        // });

        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endsection()
