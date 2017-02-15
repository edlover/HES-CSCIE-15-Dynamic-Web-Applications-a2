<?php

require('tools.php');

$roundChecked = (isset($_GET['roundUp'])) ? true : false;

if((isset($_GET['billAmount'])) && (isset($_GET['serviceScore']))
    && (isset($_GET['splitNumTimes']))) {

    # get information from the form and put into variables
    $billAmount = $_GET['billAmount'];
    $splitBy = $_GET['splitNumTimes'];
    $serviceScore = $_GET['serviceScore'];

    switch ($serviceScore) {
        case 'Exceptional':
            $tipPercent = 0.20;
            break;
        case 'Good':
            $tipPercent = 0.15;
            break;
        case 'Poor':
            $tipPercent = 0.10;
            break;
        case 'Awful':
            $tipPercent = 0;
            break;
    }

    # calculate bill total and amount each pays
    $billTotal = ($billAmount * $tipPercent) + $billAmount;

    if($roundChecked) {
        $eachPaysRounded = ceil($billTotal / $splitBy);
        $billTotalRounded = number_format($eachPaysRounded * $splitBy, 2);
    }
    else {
        $eachPays = number_format($billTotal / $splitBy, 2);
    }

    # display calculations, formatted to two decimal places
    $billTotal = number_format($billTotal, 2);
}
