@php
$corporateAddress = \App\Models\PmsModels\SupplierAddress::where(['supplier_id' => isset($purchaseOrder->relQuotation->relSuppliers->id) ? $purchaseOrder->relQuotation->relSuppliers->id : 0, 'type' => 'corporate'])->first();
$contactPersonSales = \App\Models\PmsModels\SupplierContactPerson::where(['supplier_id' => isset($purchaseOrder->relQuotation->relSuppliers->id) ? $purchaseOrder->relQuotation->relSuppliers->id : 0, 'type' => 'sales'])->first();
@endphp
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Purchase Order</title>
	<link rel="shortcut icon" href="{{ asset('images/mbm.ico')}} " />
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" media='screen,print'>
	<link rel="stylesheet" href="{{ asset('assets/css/all.css') }}" media='screen,print'>
	@stack('css')
	<link rel="stylesheet" href="{{ asset('assets/css/custom.css?v=1.3') }}" media='screen,print'>
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" media='screen,print'>
	<style type="text/css">
		@media print {
			.print_the_pages {
				display: none;
			} 
		}

	    .list-unstyled .ratings {
	        display: none;
	    }
	</style>
</head>
<body>
	<div id="app">

		<div id="content-page" class="container">
			<main class="" style="padding-bottom: 0;">
				<div id="main-body" class="">
					<div class="main-content">
						<div class="main-content-inner"> 
							<div class="row">
							<div class="col-md-12 p-30 full-height" id="print_invoice">

								<div class="panel panel-body">
									<div class="row mb-3 print-header">
										<div class="col-md-6 pt-5 print-header-left">
											<h2><strong>Purchase Order</strong></h2>
										</div>
										<div class="col-md-6  print-header-right text-right">
											 
										</div>
									</div>

									<div class="print-body">
										<div class="table-responsive">
											<table class="table table-bordered">
												<tbody>
													<tr>
														<td style="width: 50% !important">
															 
														</td>
														<td style="width: 50% !important;text-align: right !important"> 
														</td>
													</tr>
													<tr>
														<td style="width: 50% !important;font-size: 14px !important;">
															Address:& 
														</td>
														<td style="width: 50% !important;font-size: 14px !important;" class="text-right">
															PO Ref. No: 
															<br>
															PO Date:&nbsp;   
															<br>
															Quotation Ref. No:&nbsp;   
														</td>
													</tr>
													<tr>
														<td style="width: 50% !important;font-size: 14px !important;">
															Attention:&nbsp;
															 
															<br>
															Mobile:&nbsp; ,
															<br> 
															Mail:&nbsp; 
															@endif
														</td>
														<td style="width: 50% !important;font-size: 14px !important;" class="text-right">
															Delivery Location:&nbsp;
														 <div>
																 </div>
														</td>
													</tr>
													<tr>
														<td style="width: 50% !important;font-size: 14px !important;font-weight: bold !important">
															Payment Mode:&nbsp;
                                                        </td>
														<td style="width: 50% !important;font-size: 14px !important;" class="text-right">
															Delivery Contact:&nbsp; 
                                                        </td>
													</tr>
												</tbody>
											</table>
										</div>

										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr class="text-center">
														<th>SL</th>
														<th>Product</th>
														<th>UOM</th>
														<th style="width: 12% !important">Unit Price</th>
														<th>Qty</th>
														<th>Price</th>
													</tr>
												</thead>
												<tbody>
													   
												</tbody>
											</table>
											In word:  only</strong>
										</div>
										
										<div class="form-group">
											<label for="terms-condition"><strong>Terms & Conditions</strong>:</label>
											<div class="pl-4"></div>
										</div>
									</div>

									<div class="print-footer" id="footer">
										<div class="form-group text-center pt-2 pb-2">
											PO Issued by  
										</div>

										<div class="form-group">
											<small>(Note: This purchase order doesn’t require signature as it is automatically generated from MBM Group’s ERP)</small>
										</div>

										<div class="form-group row pt-2" style="border-top: 3px solid black">
											<div class="col-md-6" style="border-right: 1px solid black">
												Factory: M-19 & M-14, Section-14, Mirpur, Dhaka-1206
												<br>
												Phone: +8809678-411412, Mail: info@mbm.group
											</div>
											<div class="col-md-6 pl-5" style="border-left: 2px solid black">
												Corporate Office: Plot: 1358, Road: 50 (Old), 9 (New)
												<br>
												Avenue: 11, DOHS, Mirpur-12, Dhaka-1216
												<br>
												Website: www.mbm.group
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-md-12 mb-3">
								<center>
									<a href="#" class="btn btn-info btn-sm print_the_pages text-center">
										<i class="las la-print" aria-hidden="true"></i>
										<span>Print Invoice</span></a>
									</center>
								</div>
							</div>
							@endif

						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('assets/js/all.js')}}"></script>
<script>
	window.print();
	
	var count = 0;
	var refreshIntervalId =setInterval(function(){
		count++;
		jQuery(document).ready(function() {
			clearInterval(refreshIntervalId);
			jQuery("#load").fadeOut();
			jQuery("#loading").fadeOut("");

		});
		if( count == 5){
			clearInterval(refreshIntervalId);
			jQuery("#load").fadeOut();
			jQuery("#loading").fadeOut("");
		}
	}, 300);

	var loaderContent = '<div class="animationLoading"><div id="container-loader"><div id="one"></div><div id="two"></div><div id="three"></div></div><div id="four"></div><div id="five"></div><div id="six"></div></div>';
	let afterLoader = '<div class="loading-select left"><img src="{{ asset('images/loader.gif')}}" /></div>';

	const PrintPage=()=>{
		$('.print_the_pages').on('click', function () {
			var restorepage = $('body').html();
			var printcontent = $('#print_invoice').clone();
			$('body').empty().html(printcontent);
			window.print();
			$('body').html(restorepage)

			return false;
		}); 
	};
	PrintPage();
</script>
</html>