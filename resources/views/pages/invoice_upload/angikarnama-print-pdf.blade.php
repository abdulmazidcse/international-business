<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ 'Packing & Weight Invoice' }}</title>
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
            padding: 25px;
            font-size: 12px !important;
        }

        .table-bordered th {
            border: 1px solid #000000;
            padding: 25px;
            font-size: 12px !important;
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
            padding: 30px 0px 0px 7%;
            margin-top: 30px !important:
        }

        @font-face {
            font-family: "FN-Mahfuj-Raiyan";
            /* Give it a friendly name */
            src: url("assets/fonts/FN-Mahfuj-Raiyan-Regular.ttf") format("truetype");
        }
    </style>
</head>

<body>



    <div class="container">
        <table class="table table-bordered" style="overflow: wrap" autosize="1" width="100%">
            <tbody>
                <tr>
                    <th colspan="10" style="text-align: center; ">
                        <h2 class="mb-0" style=" "><strong>অংগীকারনামা</strong></h2>
                    </th>
                </tr>
                <tr>
                    <th colspan="10">
                        আমি  {{$order->angikarnama->name}}, {{$order->angikarnama->designation}} , {{$order->order->company->name}} ..
                        এই মর্মে প্রত্যয়ন পত্র প্রদান করছি যে, রপ্তানী চুক্তি পত্র নং {{$order->order->invoice_number}} ,
                        DATE: {{ date("d-m-Y", strtotime($order->order->order_date)) }}  এবং
                        এবং INVOICE NO: {{ $order->exp_no }} , DATE: {{ date("d-m-Y", strtotime($order->submited_date)) }} এর বিপরীতে কেজি  {{$orderdetails_sum}} পণ্য, এইচ.
                        এস.কোড নং {{$orderdetails->hs_code}} , রপ্তানীর ক্ষেত্রে বর্ণিত পণ্য উৎপাদনে উৎপাদনে কস্ট-শীটে কাঁচামাল ও
                        অন্যান্য উপাদান
                        আনুপাতিক হারে যে পরিমান দেখানো হয়েছে তা সঠিক। এ ব্যাপারে ভবিষ্যতে কোন প্রকার ব্যাত্যয় দেখা দিলে
                        আমার
                        প্রতিষ্ঠান তার দায়-দায়িত্ব বহন করবে এবং SAFTA সার্টিফিকেট বাতিলসহ রপ্তানী উন্নয়ন ব্যুরো কর্তৃক
                        আরোপিত
                        সমুদয় দায়-দায়িত্ব মানিয়া নিতে বাধ্য থাকিব। 
                        <br>
                        <br>
                        <br>
                    </th>

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
