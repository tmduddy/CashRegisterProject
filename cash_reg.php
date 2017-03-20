<!DOCTYPE html>
<html>
<head>
    <script src="jquery-3.2.0.min.js" charset="UTF-8"></script>
    <script>

        window.onload=function(){
            var foodButton = document.getElementById("combo1");
            foodButton.addEventListener("click", hideDetails, false);

        }

        function hideDetails() {
            $('#orderDetails').toggle();
        }

    </script>

<title>Cash Register</title>
<link rel="stylesheet" type="text/CSS" href="cash_reg.css">
</head>

<body>

<div class="container">
<div class="buttonContainer">

<div id="orderDetails" class="orderDetails">
    <p> nothing to see here yet.</p>
</div>
<?php

    $pathToTxtFiles = '/Applications/XAMPP/xamppfiles/htdocs/CashRegisterProject/txt_files/';

	fopen($pathToTxtFiles . 'combos.txt', 'r');
	fopen($pathToTxtFiles . 'comboprice.txt', 'r');

	$comboLabelFile = $pathToTxtFiles . 'combos.txt';
	$comboLabels = file($comboLabelFile, FILE_IGNORE_NEW_LINES);

	$comboPrices = array(
                        6.99,
                        7.99,
                        8.99,
                        7.89,
                        5.99,
                        6.87,
                        6.88,
                        6.89,
                        7.79,
                        5.59);

    $combo = array_combine($comboPrices, $comboLabels);

    // $combo is an array of the form [$price => $ Name]


function printComboButtons($combos) {
	    $prices = array();
        $names = array();
	    foreach($combos as $price => $name){
	        array_push($prices, $price);
	        array_push($names, $name);
        } // end foreach()

        $nums = array("combo1", "combo2", "combo3", "combo4", "combo5", "combo6", "combo7", "combo8", "combo9", "combo10");


        for($i = 0; $i < sizeof($nums); $i++) {
            print "<div id=$nums[$i] class='foodButton'>";
            print $names[$i];
            print "</div>";
            print "<br>";
        } // end for()



	} // end printComboButtons()

	printComboButtons($combo);

?>    <!-- end PHP  -->
</div> <!-- End buttonContainer div -->

<div id="orderContainer" class="orderContainer">
Your orders will be printed here.
</div>

</div> <!-- end container div -->