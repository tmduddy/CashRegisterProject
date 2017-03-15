<!DOCTYPE html>
<html>
<head>
<title>Cash Register</title>
<link rel="stylesheet" type="text/CSS" href="cash_reg.css">
</head>

<body>
<div class="buttonContainer">
<?php
	fopen('/Applications/XAMPP/xamppfiles/htdocs/TestEnviron/combos.txt', 'r');
	fopen('/Applications/XAMPP/xamppfiles/htdocs/TestEnviron/comboprice.txt', 'r');

	$comboLabelFile = '/Applications/XAMPP/xamppfiles/htdocs/TestEnviron/combos.txt';
	$comboLabels = file($comboLabelFile, FILE_IGNORE_NEW_LINES);

	$comboPriceFile = '/Applications/XAMPP/xamppfiles/htdocs/TestEnviron/comboprice.txt';
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
                        print "<input type='checkbox' id=' (str) $i+1' class = 'foodButton' value='$prices[1][$i]'>";
                        print $names[$i];
                        print "<br>";
                    } // end for()
        echo <<<HERE
                </formset>
            </form>

		</div>


HERE;

	} // end printComboButtons()

	printComboButtons($combo);

?>
</div> <!-- End buttonContainer div -->

<div class="orderContainer">
Your orders will be printed here.
</div>