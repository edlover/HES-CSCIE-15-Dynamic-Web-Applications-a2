<?php require("calculateBill.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Tip Splitter</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Bill Splitter</h1>
            </div>
        </div>
        <form method="GET">
            <div class="row">
                <div class="col-md-6 rightJustify">
                    <label for="splitNumTimes">Split how many ways?:</label>
                </div>
                <div class="col-md-6">
                    <select name="splitNumTimes" id="splitNumTimes">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 rightJustify">
                    <label for="billAmount">How much was the tab?:</label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="billAmount" id="billAmount" placeholder="bill amount">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 rightJustify">
                    <label for="serviceScore">How was the service?:</label>
                </div>
                <div class="col-md-6">
                    <select name="serviceScore" id="serviceScore">
                        <option value="0.20">Exceptional (20%)</option>
                        <option value="0.15">Good (15%)</option>
                        <option value="0.10">Poor (10%)</option>
                        <option value="0">Awful (0%)</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 rightJustify">
                    <label for="roundUp">Round up?:</label>
                </div>
                <div class="col-md-6">
                    <input type="checkbox" name="roundUp" id="roundUp">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 rightJustify">
                    <input type="submit" class="btn btn-primary bt-small">
                </div>
                <div class="col-md-6">
                    <input type="reset" class="btn btn-primary bt-small">
                </div>
            </div>
        </form>
        <div class="row">
            <div id="output">
                <p><?php if(isset($billTotal)) echo "Total (with tip): $" . $billTotal ?></p>
                <p><?php if(isset($eachPays)) echo "Each person pays: $" . $eachPays ?></p>
                <p><?php if(isset($billTotalRounded)) echo "With rounding for each payer, the grand total : $" . $billTotalRounded ?></p>
            </div>
        </div>
    </div>
</body>
</html>
