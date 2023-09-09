<?php

function convertIndonesianDateToCarbon($dateString) {
    $explodedDate = explode(',', $dateString);
    $dateString = isset($explodedDate[1]) ? trim($explodedDate[1]) : trim($explodedDate[0]);

    $monthTranslations = [
        'Januari'   => 'January',
        'Februari'  => 'February',
        'Maret'     => 'March',
        'April'     => 'April',
        'Mei'       => 'May',
        'Juni'      => 'June',
        'Juli'      => 'July',
        'Agustus'   => 'August',
        'September' => 'September',
        'Oktober'   => 'October',
        'November'  => 'November',
        'Desember'  => 'December'
    ];
    

    foreach ($monthTranslations as $indonesian => $english) {
        $dateString = str_replace($indonesian, $english, $dateString);
    }

    return \Carbon\Carbon::parse($dateString);
}
