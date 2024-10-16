<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ 'Rawza Transport Agency' }}</title>
    <style>
        @page {
            margin-top: 1.85in;
            margin-bottom: 1.75in;
            header: page-header;
            footer: page-footer;
            background-image-resize: 6;
        }

        html,
        body,
        p {
            color: #000000;
        }

        table {

            border-spacing: 0px !important;
        }

        table caption {
            color: #000000 !important;
        }

        .table-non-bordered {
            padding-left: 0px !important;
        }

        .table-bordered {
            border-collapse: collapse;
            font-size: 10px;
        }

        .table-bordered td {
            border: 1px solid #000000;
            padding: 2px;
            font-size: 8px !important;
        }

        .table-bordered th {
            border: 1px solid #000000;
            padding: 2px;
            font-size: 8px !important;
            text-transform: uppercase;
        }

        .table-bordered tr:first-child td {
            border-top: 0;
        }

        .table-bordered tr td:first-child {
            border-left: 0;
        }

        .table-bordered tr:last-child td {
            border-bottom: 0;
        }

        .table-bordered tr td:last-child {
            border-right: 0;
        }

        .mt-0 {
            margin-top: 0;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .break-before {
            page-break-before: always;
            break-before: always;
        }

        .break-after {
            break-after: always;
        }

        .break-inside {
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .break-inside-auto {
            page-break-inside: auto;
            break-inside: auto;
        }

        .space-top {
            margin-top: 10px;
        }

        .space-bottom {
            margin-bottom: 10px;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-left {
            text-align: left !important;
        }

        .signatures {
            padding: 30px 0px 0px 2%;
            margin-top: 20px !important:
        }
    </style>
</head>

<body>



    <div class="container">
        <table class="" style="overflow: wrap" autosize="1">
            <tbody> 
				<tr>
                    <td colspan="3">
                        <strong>RAWZA TRANSPORT AGENCY</strong><br>
                        TRANSPORT CONTRACTORS & COMMISSION AGENT
                    </td>
                    <td colspan="3">
                        <strong>HEAD OFFICE:</strong><br>
                        SSG Center
                        Nabosrista Plot # 1/A Tejgaon I/A, Dhaka -1208.<br>
                        TEL: 028391751-6, Reg. No. 1322, DT 12.5.1999
                    </td>
                </tr>
			</tbody>
		</table>
        <table class="table table-bordered" style="overflow: wrap" autosize="1">
            <tbody> 
                <tr>
                    <td colspan="2" class="header center-text">
                        The Consignment will not be detained diverted, re-routed or re-booked without Consignee Bank's
                        written permission will be delivered at the destination
                    </td>
                    <td colspan="2" class="header center-text">
                        NON NEGOTIABLE
                    </td>
                    <td colspan="2" class="header center-text">
                        <strong>SCHEDULE OF DEMURRAGE CHARGES</strong>
                        <p>Demurrage chargeable after..........days from today @ Tk. per day per ton on weight charge
                        </p>
                    </td>
                    <td rowspan="3" class="header center-text">
                        Address of issuing office or name and address of agent
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="title">Address of delivery office</td>
                    <td colspan="2" class="title"><strong>AT OWNER'S RISK INSURANCE</strong></td>
                    <td colspan="2" class="title"><strong>NOTICE</strong></td>
                </tr>
                <tr>
                    <td colspan="2"  ></td>
                    <td colspan="2"  >The Customer has stated that he has not insured the consignment or
                        he has insured the consignment
                    </td>
                    <td colspan="2" rowspan="7">The consignment covered by
						this seal of special Lory
						Receipt Form shall be stored
						at the destination under the
						control of the Transport
						Operator and shall be
						delivered to or to the order
						of the Consignee Bank
						whose name is mentioned in
						the Lorry Receipt. It will
						under no circumstances be
						delivered to anyone without
						the written authority from
						the Consignee Bank or its
						order, endorsed on the
						Consignee Copy or on a
						separate letter of Authority</td>
                </tr> 
                
                <tr>
                    <td colspan="2" class="title">CONSIGNMENT NOTE</td>
                    <td colspan="2">Company:</td>
                    <td colspan="2" rowspan="5">Truck No:</td>
                </tr>
                <tr>
                    <td colspan="2"> </td>
                    <td colspan="2" class="highlight">Policy No.  : </td> 
                </tr>
                <tr>
                    <td colspan="2">Challan No :  {{$orderlist->order->invoice_number}} </td>
                    <td colspan="2" class="highlight">Date  : {{ date('d-m-Y', strtotime($orderlist->order->order_date))}} </td> 
                </tr>
                <tr>
                    <td colspan="2"> </td>
                    <td colspan="2" class="highlight">Amount  : </td> 
                </tr>
                <tr>
                    <td colspan="2">DT : 13-03-2024 </td>
                    <td colspan="2" class="highlight">Risk    :</td> 
                </tr>
			</tbody>
		</table>
		<table class="table table-bordered" style="overflow: wrap" autosize="1" style="margin-top: 30px">
			<tbody>
                <tr>
                    <td colspan="6" class="highlight"> 
                        UNTO THE ORDER OF: {{$orderlist->order->bank->name }}, {{$orderlist->order->bank->branch }}
                        {{$orderlist->order->bank->address }}, SWIFT CODE: {{$orderlist->order->bank->swift_code }}, ACCOUNT NO:  {{$orderlist->order->bank->account_no }}
                    </td>
                    <td colspan="2" rowspan="5" class="highlight">
						From : {{$orderlist->order->discharged->name }} <br><br>
						To : {{$orderlist->order->destination->name }}
                    </td>
                    <td colspan="2" rowspan="5" class="highlight">
                        <p>M.R. No.</p>
						<strong>Freight Collect</strong> <br>
						<strong>Branch</strong> <br>
						<strong>Code No.</strong> 
                    </td>
                </tr>
                <tr>
                    <td colspan="6">Notify:
                        {{ $orderlist->order->customer->name }}. {{ $orderlist->order->customer->address }}
                        {{-- DOSI TOURISM PVT LTD, DOSI BHAWAN, PALTAN BAZAR Contact No: 0361-54717, 0361-
                        541718, GUWAHATI, ASSAM, KAMRUP, ASSAM, 781008 --}}
                    </td> 
                </tr>
                <tr>
                    <td colspan="6">PAN NO: {{ $orderlist->order->pan_number }} </td>                     
                </tr>
                <tr>
                    <td colspan="6" style="height: 15px"> </td>                     
                </tr>
                <tr>
                    <td colspan="6" class="highlight">EXPORTER: {{ $orderlist->order->company->name }}. {{ $orderlist->order->company->address }}</td>
                </tr>
			</tbody>
		</table>
		<table class="table table-bordered" style="overflow: wrap" autosize="1" style="margin-top: 20px; width: 100%" >
			<tbody>
                <tr>
                    <td colspan="2" class="header">Packages</td>
                    <td colspan="4" class="header">Description (Said to contain)</td>
                    <td colspan="2" class="header">Weight</td>
                    <td colspan="2" class="header">Destination</td>
                    <td class="header">Amount</td>
                    <td colspan="2" rowspan="2" class="header">Consignee <br> S.S.T No</td>
                </tr>
                @php
                    $packages = 0;
                    $totalBunch = 0;
                    $descriptions = '';
                    $grossWeight = 0;
                    $netWeight = 0;
                    $totalValueUsd = 0;
                    $destination = '';
                    $amount = '';
                    $consignee = '';
                    foreach ($orderDetails as $key => $value) {
                        $packages += $value->net_weight;
                        $totalBunch += $value->total_bunch;
                        $descriptions .= '<span>'. $value->description .'<span> <br>';
                        $grossWeight += $value->gross_weight;
                        $netWeight += $value->net_weight;
                        $totalValueUsd +=$value->total_value;
                        $amount = '';
                        $consignee = '';
                    }
                @endphp
                <tr>
                    <td colspan="2" rowspan="6" >{{ $packages }} KGS <br> {{ $totalBunch }} CTN</td>
                    <td colspan="4" rowspan="2" >{!! $descriptions !!}</td>
                    {{-- <td colspan="4" class="header">Description (Said to contain)</td> --}}
                    <td colspan="2" rowspan="6"> AS AGREED </td>
                    <td colspan="2" rowspan="5">GROSS WEIGHT <br> 
                        {{ $grossWeight }} KGS
                         <br><br><br>
                         NET WEIGHT <br>
                         {{ $netWeight }} KGS
                     </td>
                    <td rowspan="5">$20</td> 
                </tr>
                <tr>
                    
                    
                    
                    {{-- <td colspan="1" >sss 22 </td> --}}
                    <td colspan="2" rowspan="5">Consignee <br> C.S.T No <br> S.S.T No <br>
                    
                        <strong> ENDORSEMENT </strong>	<br>
                        It is intended to use the	<br>
                            CONSIGNEE COPY of <br> this set for the purpose of <br> borrowing from the <br> Consignee Bank	 
                        </td> 
                </tr> 
                <tr>
                    <td colspan="2"> COMMERCIAL INVOICE : </td>
                    <td colspan="2"> {{ $orderlist->order->invoice_number }}  </td> 
                </tr>
                <tr>
                    <td colspan="2"> Date: </td>
                    <td colspan="2"> {{ date("d-m-Y", strtotime($orderlist->order->order_date)) }} </td>  
                </tr>
                <tr>
                    <td colspan="2"> Sales Contact No:</td>
                    <td colspan="2"> {{ $orderlist->order->invoice_number }} </td> 
                </tr>
                <tr>
                    <td colspan="2"> Date </td>
                    <td colspan="2"> {{ date("d-m-Y", strtotime($orderlist->order->order_date)) }} </td>
                    {{-- <td colspan="2"> </td> --}}
                    <td colspan="2">Total  </td>
                    <td>{{ $totalValueUsd }}</td>
                </tr> 
            </tbody>
        </table>

        <table class="signatures">
            <tbody style="width: 100% !important">
                <tr style="width: 100% !important">
                    <td style="text-align: left;" colspan="2" > 
                        Signature of Transport Operator	
                    </td>
                    <td  colspan="5" style="width: 300px">  </td>
                    <td colspan="2" style="text-align: right; border: none !important;">
                        LOADED ON TRUCK 
                    </td> 
                </tr> 
                <tr style="width: 100% !important">
                    <td  colspan="7" >  </td>
                    <td colspan="2" style=" border: none !important;">
                       Date
                    </td> 
                </tr> 
            </tbody>
    
        </table> 
    </div> 
</body>

</html>
