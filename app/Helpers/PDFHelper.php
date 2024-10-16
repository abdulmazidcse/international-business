<?php

namespace App\Helpers;

use Mpdf\Mpdf;

class PDFHelper
{

    public static function generatePDF($view, $data = [])
    {
        $html = view($view, $data)->render();

        // Create an instance of mPDF with appropriate settings
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'font-family'=> 'bangla',
            'setAutoTopMargin' => 'stretch',
            'setAutoBottomMargin' => 'stretch',
            'default_font' => 'FN-Mahfuj-Raiyan',
            'tempDir' => storage_path('app/tmp')
        ]);

        // Write the HTML content to the PDF
        $mpdf->WriteHTML($html);
        
        // Return the PDF as a string (output inline in the browser)
        return $mpdf->Output('', 'S');
    }
    // public static function generatePDF($view, $data = [])
    // {
    //     $html = view($view, $data)->render();

    //     $mpdf = new Mpdf([
    //         'mode' => 'utf-8', // Set character encoding for proper text display
    //         'format' => 'A4', // Default paper format (adjust as needed)
    //         'orientation' => 'P', // Default page orientation (portrait)
    //     ]);

    //     // Optional configuration (uncomment and adjust as needed):
    //     // $mpdf->shrink_tables_to_fit = 1; // Automatically shrink tables to fit page
    //     // $mpdf->SetMargins(10, 10, 10, 10); // Set custom page margins

    //     $mpdf->WriteHTML($html);

    //     // Determine desired output behavior:
    //     // $output = $mpdf->Output('filename.pdf', 'D'); // Download the PDF (recommended)
    //     $output = $mpdf->Output('', 'S'); // Return the PDF as a string (output inline in the browser)
    //     // $output = $mpdf->Output('', 'S'); // Return PDF as string (for potential inline display)

    //     return $output;
    // }
}

// class PDFHelper
// {
//     public static function generatePDF($view, $data = [])
//     {
//         $html = view($view, $data)->render();

//         $mpdf = new Mpdf();
//         // $mPdf->shrink_tables_to_fit = 1;
//         $mpdf->WriteHTML($html);
        
//         return $mpdf->Output('', 'S'); // Return the PDF as a string (output inline in the browser)
//     }
// }
