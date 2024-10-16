<?php


function numberToWord($num) {
    // Split the number into integer and decimal parts
    $parts = explode('.', $num);
    $integerPart = $parts[0];
    $decimalPart = isset($parts[1]) ? $parts[1] : null;

    // Function to convert integer part to words
    function convertIntegerToWords($num) {
        if ($num == 0) {
            return 'Zero';
        }

        $num = (string) ((int) $num);
        $num = str_replace(array(',', ' '), '', trim($num));

        $list1 = array(
            '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten',
            'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
        );
        $list2 = array(
            '', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'
        );
        $list3 = array(
            '', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion',
            'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion',
            'quattuordecillion', 'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
        );

        $num_length = strlen($num);
        $levels = (int) (($num_length + 2) / 3);
        $max_length = $levels * 3;
        $num = substr('00' . $num, -$max_length);
        $num_levels = str_split($num, 3);

        $words = array();
        foreach ($num_levels as $num_part) {
            $levels--;
            $hundreds = (int) ($num_part / 100);
            $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ' ' : '');
            $tens = (int) ($num_part % 100);
            $singles = '';
            if ($tens < 20) {
                $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '');
            } else {
                $tens = (int) ($tens / 10);
                $tens = ' ' . $list2[$tens] . ' ';
                $singles = (int) ($num_part % 10);
                $singles = ' ' . $list1[$singles] . ' ';
            }
            $words[] = $hundreds . $tens . $singles . (($levels && (int) ($num_part)) ? ' ' . $list3[$levels] . ' ' : '');
        }

        $words = implode(', ', $words);
        $words = trim(str_replace(' ,', ',', ucwords($words)), ', ');
        $words = str_replace(',', ' and', $words);

        return $words;
    }

    // Convert the integer part
    $integerWords = convertIntegerToWords($integerPart);

    // Convert the decimal part
    $decimalWords = '';
    if ($decimalPart !== null) {
        $decimalPart = str_pad($decimalPart, 2, '0', STR_PAD_RIGHT); // Ensure the decimal part is two digits
        $decimalWords = convertIntegerToWords($decimalPart);
    }

    // Combine the integer and decimal parts
    if ($decimalWords) {
        return $integerWords . ' and ' . $decimalWords . ' cents only';
    } else {
        return $integerWords . ' only';
    }
}


// function storage path
function storagePath()
{
    $host = request()->getHttpHost();
    if (str_contains($host, '127.0.0.1') || str_contains($host, 'localhost')) { 
        $path = 'storage/';
    }else{
        $path = storage_path();
    }
    return $path;
}


function getFinancialYear($inputDate,$format="Y"){
    $date=date_create($inputDate);
    if (date_format($date,"m") > 6) {//On or After July (FY is current year - next year)
        $financial_year = (date_format($date,$format)) . '-' . (date_format($date,$format)+1);
    } else {//On or Before june (FY is previous year - current year)
        $financial_year = (date_format($date,$format)-1) . '-' . date_format($date,$format);
    }
    return $financial_year;
} 
function fiscalYears($start_year, $end_year){ 
    $financial_years = [];
    for ($year = $start_year; $year <= $end_year; $year++) {
        $financial_years[] = getFinancialYear($year . "-07-01"); // Assuming July 1st as the input date
    }
    return $financial_years;
}
