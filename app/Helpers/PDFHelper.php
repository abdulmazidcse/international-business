<?php

namespace App\Helpers;

use Mpdf\Mpdf;

class PDFHelper
{
    public static function generatePDF($view, $data = [])
    {
        $html = view($view, $data)->render();

        $mpdf = new Mpdf();
        // $mPdf->shrink_tables_to_fit = 1;
        $mpdf->WriteHTML($html);
        
        return $mpdf->Output('', 'S'); // Return the PDF as a string (output inline in the browser)
    }
}
