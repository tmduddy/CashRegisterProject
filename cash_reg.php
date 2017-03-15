<!DOCTYPE html>
<html>
<head>
<title>Cash Register</title>
<link rel="stylesheet" type="text/CSS" href="cash_reg.css">
</head>

<body>
<div class="buttonContainer">
<?php

    $pathToTxtFiles = '/Applications/XAMPP/xamppfiles/htdocs/CashRegisterProject/txt_files/';

	fopen($pathToTxtFiles . 'combos.txt', 'r');
	fopen($pathToTxtFiles . 'comboprice.txt', 'r');

	$comboLabelFile = $pathToTxtFiles . 'combos.txt';
	$comboLabels = file($comboLabelFile, FILE_IGNORE_NEW_LINES);

	$comboPriceFile = $pathToTxtFiles . 'comboprice.txt';
	$comboPrices = file($comboPriceFile, FILE_IGNORE_NEW_LINES);

    $combo = array_combine($comboPrices, $comboLabels);

    // $combo is an array of the form [$price => $ Name]

	function printComboButtons($combos) {
	    $prices = array();
        $names = array();
	    foreach($combos as $price => $name){
	        array_push($prices, $price);
	        array_push($names, $name);
        } // end foreach()
        echo <<<HERE
            <div class='comboContainer'>
			<form action='' method='post'>
                <formset>
HERE;
                    for($i = 0; $i < sizeof($prices); $i++) {
                        print "<input type='checkbox' id=' (str) $i+1' class = 'foodButton comboButton' value='$prices[1][$i]'>";
                        print $names[$i];
                        print "<br>";
                    } // end for()
        echo <<<HERE
                </formset>
            </form>

		</div>


HERE;

	} // end printComboButtons()


    function printFoodButtons(){

    }
	printComboButtons($combo);

?>
</div> <!-- End buttonContainer div -->

<div class="orderContainer">
Your orders will be printed here.
</div>