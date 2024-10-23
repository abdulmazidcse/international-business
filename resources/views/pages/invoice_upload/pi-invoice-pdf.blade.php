<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ 'Proforma Invoice' }}</title>
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
	   .signatures{
		   padding: 30px 0px 0px 7%; 
		   margin-top: 30px !important: 
	   }
   </style>
</head>

<body>



	<div class="container">
		<table class="table table-bordered" style="overflow: wrap" autosize="1">
			<tbody>
				<tr>
					<th colspan="10" style="text-align: center; ">
						<h2 class="mb-0" style=" "><strong>Proforma Invoice</strong></h2>
					</th>
				</tr>
				<tr>
					<th style="text-align: right !important; ">
					   Proforma Invoice
					</th>
					<th colspan="2" style="text-align: right !important; ">
						{{ $orderlist->invoice_number }}
					</th>
					<th colspan="3" rowspan="2" style="text-align: right !important; ">
						SALES TERM: {{ $orderlist->sales_term }}
					</th>

					<th colspan="4" rowspan="2" style="text-align: right !important; ">
						COUNTRY OF ORIGIN : {{ $orderlist->country->name }}
					</th>
				</tr>
				<tr>
					<th style="text-align: right !important; ">
						Date
					</th>
					<th colspan="2" style="width: 30% !important;text-align: right !important">
						{{ $orderlist->order_date }}
					</th>
				</tr>
				<tr>
					<th colspan="3" style="width: 30% !important;text-align: right !important">
						EXPORTER
					</th>
					<th colspan="3" style="width: 30% !important;text-align: right !important">
						IMPORTER
					</th>
					<th colspan="4" style="width: 30% !important;text-align: right !important">
						IMPORTER BANK
					</th>
				</tr>
				<tr>
					<th colspan="3" style="width: 30% !important;text-align: right !important">
						{{ $orderlist->company->name }}. {{ $orderlist->company->address }}
					</th>
					<th colspan="3" style="width: 30% !important;text-align: right !important">
						{{ $orderlist->customer->name }}. {{ $orderlist->customer->address }}
					</th>
					<th colspan="4" style="width: 30% !important;text-align: right !important">
						{{$orderlist->bank->name}}, 
						{{$orderlist->bank->account_no}}, 
						{{$orderlist->bank->swift_code}},
						{{$orderlist->bank->branch}}
					</th>
				</tr>
				<tr>
					<th colspan="3" style="width: 30% !important;text-align: right !important">
						BENEFICIARY BANK
					</th>
					<th colspan="7" style="width: 30% !important;text-align: right !important">
						IMPORTER’S IEC NO : {{ $orderlist->importer_iec_no }}
					</th>
				</tr>
				<tr>
					<th colspan="3" rowspan="4" style="width: 30% !important;text-align: right !important">
						{{$orderlist->bank->name}}, 
						{{$orderlist->bank->account_no}}, 
						{{$orderlist->bank->swift_code}},
						{{$orderlist->bank->branch}}
					</th>
					<th colspan="3" style="width: 30% !important;text-align: right !important">
						MODE OF CARRYING:
					</th>
					<th colspan="4" style="width: 30% !important;text-align: right !important">
						{{ $orderlist->mode->name }}
					</th>
				</tr>
				<tr>
					<th colspan="3" style="width: 30% !important;text-align: right !important">
						Port of Discharged:
					</th>
					<th colspan="4" style="width: 30% !important;text-align: right !important">
						{{ $orderlist->discharged->name }}
					</th>
				</tr>
				<tr>
					<th colspan="3" style="width: 30% !important;text-align: right !important">
						FINAL DESTINATION:
					</th>
					<th colspan="4" style="width: 30% !important;text-align: right !important">
						{{ $orderlist->destination->name }}
					</th>
				</tr>
				<tr>
					<th colspan="3" style="width: 30% !important;text-align: right !important">
						LOADING PLACE:
					</th>
					<th colspan="4" style="width: 30% !important;text-align: right !important">
						{{ $orderlist->loading->name }}
					</th>
				</tr>
				<tr class="text-center">
					<td style="text-align:  center;width: 5% !important"><strong>Product <br> Code</strong></th>
					<td style="text-align:  center;width: 20% !important"><strong>Description of Goods</strong></td>
					<td style="text-align:  center;width: 5% !important"><strong>HS Code</strong></td>
					<td style="text-align:  center;width: 10% !important"><strong>Total <br> Bunch/CTN</strong></td>
					<td style="text-align:  center;width: 10% !important"><strong>PCS IN <br> Bunch/CTN</strong></td>
					<td style="text-align:  center;width: 10% !important"><strong>Qty (PCS)</strong></td>
					<td style="text-align:  center;width: 10% !important"><strong>Weight/Unit </strong></td>
					<td style="text-align:  center;width: 10% !important"><strong>Net WT(KG)</strong></td>
					<td style="text-align:  center;width: 15% !important"><strong>Rate/TON</strong></td>
					<td style="text-align:  center;width: 15% !important"><strong>Total Value <br> (USD)</strong></td>
				</tr>
				@php
					$totalPcsPerBunch = 0;
					$totalQuantity = 0;
					$totalNetWeight = 0;
					$totalValueUsd = 0;
				@endphp
				@foreach ($orderdetails as $orderDetail)
					@php
						$totalPcsPerBunch +=$orderDetail->pcs_per_bunch;
						$totalQuantity +=$orderDetail->quantity;
						$totalNetWeight +=$orderDetail->net_weight;
						$totalValueUsd +=$orderDetail->total_value;
					@endphp
					<tr class="text-center">
						<td style="text-align:  center;width: 5% !important">
							<strong>{{ $orderDetail->product_code }}</strong></td>
						<td style="text-align:  center;width: 5% !important">
							<strong>{{ $orderDetail->description }}</strong></td>
						<td style="text-align:  center;width: 5% !important">
							<strong>{{ $orderDetail->hs_code }}</strong></td>
						<td style="text-align:  center;width: 5% !important">
							<strong>{{ $orderDetail->total_bunch }}</strong></td>
						<td style="text-align:  center;width: 5% !important">
							<strong>{{ $orderDetail->pcs_per_bunch }}</strong></td>
						<td style="text-align:  center;width: 5% !important">
							<strong>{{ $orderDetail->quantity }}</strong></td>
						<td style="text-align:  center;width: 5% !important">
							<strong>{{ $orderDetail->weight_per_unit }}</strong></td>
						<td style="text-align:  center;width: 5% !important">
							<strong>{{ $orderDetail->net_weight }}</strong></td>
						<td style="text-align:  center;width: 5% !important">
							<strong>{{ $orderDetail->unit_rate }}</strong></td>
						<td style="text-align:  center;width: 5% !important">
							<strong>{{ $orderDetail->total_value }}</strong></td>
					</tr>
				@endforeach
				@php
				   //  $totalValueUsd2 =  round($totalValueUsd);
				   $totalValueUsd2 = 1234.65; 
				   $freight = 25;
				   $totalValueUsdWithFreight = $totalValueUsd + $freight;
				@endphp
				<tr>
					<td colspan="3" style="text-align: center;"><strong> Total </strong></td>
					<td><strong> </strong></td>
					<td style="text-align:center;"><strong> {{ $totalPcsPerBunch }} </strong></td>
					<td style="text-align:center;"><strong>{{ $totalQuantity }}</strong></td>
					<td style="text-align:center;"><strong> </strong></td>
					<td style="text-align:center;"><strong>{{ $totalNetWeight }}</strong></td>
					<td style="text-align:center;"><strong></strong></td>
					<td style="text-align:center;"><strong>${{ $totalValueUsd }}</strong></td>
				</tr>
				<tr>
					<td colspan="9" style="text-align: center;"><strong> FREIGHT </strong></td>
					<td style="text-align: center;"><strong> $25</strong></td>
				</tr>
				<tr>
					<td colspan="9" style="text-align: center;"><strong> GRAND TOTAL </strong></td>
					<td style="text-align: center;"><strong> ${{ $totalValueUsdWithFreight}}</strong></td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: center; text-transform: uppercase"><strong> Total In Words: USD {{ numberToWord($totalValueUsdWithFreight) }} </strong></td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
					   <strong> Terms & Conditions:
						   {!! $orderlist->customer->terms_and_conditions !!} 

						</strong></td>
				</tr>
			</tbody> 
		   </table>
		   <table class="signatures">
			   <tbody>
				   <tr>
					   <td colspan="2" style="text-align: center;"> 
						@if($signature)
							<img src="data:image/png;base64,{{ $signature }}" alt="Signature" style="width:100px; height:auto;">
						@endif
					   </td>
				   </tr>
				   <tr style="border: none !important"> 
				   </tr>
				   <tr>
					   <td colspan="2" style="text-align: right;border: none !important;">
						   
					   </td>
				   </tr>
			   </tbody>
	   
		   </table>
	</div> 
</body>

</html>
