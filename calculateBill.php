<?php
require('tools.php');
require('Form.php');

$tipForm = new DWA\Form($_GET);
$errors = [];

if($tipForm->isSubmitted()) {

    # get information from the form and put into variables
    $billAmount = $tipForm->get('billAmount', $default = '');
    $splitBy = $tipForm->get('splitNumTimes', $default = '');
    $serviceScore = $tipForm->get('serviceScore', $default = '');
    $roundChecked = $tipForm->isChosen('roundUp');

    # perform validation on the form entries
    $errors = $tipForm->validate(
        [
            # bill amount should only be numberic and is required
            'billAmount' => 'required|min:0',
        ]
    );

    if(!$errors) { # if no errors, then perform the calculations

        # assign the service score to a percentage for calculation
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

} # endif for if($tipForm->isSubmitted())
