<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("calculateBill.php"); ?>
    <meta charset="UTF-8" />
    <title>Tip Splitter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Bill Splitter</h1>
            </div>
        </div>
        <form method="GET">
            <div class="row">
                <div class="col-xs-6 rightJustify">
                    <label for="splitNumTimes">Split how many ways?:</label>
                </div>
                <div class="col-xs-6">
                    <select name="splitNumTimes" id="splitNumTimes">
                        <?php if(!isset($splitBy)) $splitBy = "1" ?>
                        <option value="1" <?php if($splitBy == "1") echo "selected" ?>>1</option>
                        <option value="2" <?php if($splitBy == "2") echo "selected" ?>>2</option>
                        <option value="3" <?php if($splitBy == "3") echo "selected" ?>>3</option>
                        <option value="4" <?php if($splitBy == "4") echo "selected" ?>>4</option>
                        <option value="5" <?php if($splitBy == "5") echo "selected" ?>>5</option>
                        <option value="6" <?php if($splitBy == "6") echo "selected" ?>>6</option>
                        <option value="7" <?php if($splitBy == "7") echo "selected" ?>>7</option>
                        <option value="8" <?php if($splitBy == "8") echo "selected" ?>>8</option>
                        <option value="9" <?php if($splitBy == "9") echo "selected" ?>>9</option>
                        <option value="10" <?php if($splitBy == "10") echo "selected" ?>>10</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 rightJustify">
                    <label for="billAmount">How much was the tab?:</label>
                    <p class="subScript">* Required</p>
                </div>
                <div class="col-xs-6">
                    <input type="text" name="billAmount" id="billAmount" placeholder="ex. 24.99" value="<?php if(isset($billAmount)) echo $tipForm->sanitize($billAmount) ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 rightJustify">
                    <label for="serviceScore">How was the service?:</label>
                </div>
                <div class="col-xs-6">
                    <select name="serviceScore" id="serviceScore">
                        <?php if(!isset($serviceScore)) $serviceScore = "Exceptional" ?>
                        <option value="Exceptional" <?php if($serviceScore == "Exceptional") echo "selected" ?>>Exceptional (20%)</option>
                        <option value="Good" <?php if($serviceScore == "Good") echo "selected" ?>>Good (15%)</option>
                        <option value="Poor" <?php if($serviceScore == "Poor") echo "selected" ?>>Poor (10%)</option>
                        <option value="Awful" <?php if($serviceScore == "Awful") echo "selected" ?>>Awful (0%)</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 rightJustify">
                    <label for="roundUp">Round up?:</label>
                </div>
                <div class="col-xs-6">
                    <input type="checkbox" name="roundUp" id="roundUp" <?php if($tipForm->isChosen('roundUp')) echo 'CHECKED' ?>>
                      Yes
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12" id="calculate"> 
                    <input type="submit" value="Calculate" class="btn btn-primary bt-small">
                </div>
            </div>
        </form>

        <?php if($errors): ?>
            <div class='alert alert-danger'>
                <div class="row">
                    <div class="col-xs-4 rightJustify">
                        <span class="glyphicon glyphicon-remove-circle"></span>
                    </div>
                    <div class="col-xs-8">
                        <ul>
                            <?php foreach($errors as $error): ?>
                                <li><?=$error?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

        <?php elseif($tipForm->isSubmitted()): ?>

            <div class='alert alert-info'>
                <div class="row">
                    <div class="col-xs-4 rightJustify">
                        <span class="glyphicon glyphicon-ok-circle"></span>
                    </div>
                    <div class="col-xs-8">
                        <ul>
                            <li>Total (with tip): $<?=$billTotal?></li>
                            <?php if($tipForm->isChosen('roundUp')) : ?>
                                <li>Each person pays (rounded up): $<?=$eachPaysRounded?></li>
                                <li>With rounding, the total to leave is: $<?=$billTotalRounded?></li>
                            <?php else : ?>
                                <li>Each person pays: $<?=$eachPays?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</body>
</html>
