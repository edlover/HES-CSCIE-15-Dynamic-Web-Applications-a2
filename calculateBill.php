<?php

# See if option to round up is selected
$roundChecked = (isset($_GET['roundUp'])) ? true : false;

if((isset($_GET['billAmount'])) && (isset($_GET['serviceScore']))
    && (isset($_GET['splitNumTimes']))) {

    # get information from the form and put into variables
    $billAmount = $_GET['billAmount'];
    $tipPercent = $_GET['serviceScore'];
    $splitBy = $_GET['splitNumTimes'];

    # calculate bill total and amount each pays
    $billTotal = ($billAmount * $tipPercent) + $billAmount;
    $eachPays = ($billTotal / $splitBy);


    # display calculations, formatted to two decimal places
    $billTotal = number_format($billTotal, 2);
    $eachPays = number_format($eachPays, 2);
}
