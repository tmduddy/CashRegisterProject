<!DOCTYPE html>
<html>
<head>
    <script src="jquery-3.2.0.min.js" charset="UTF-8"></script>
    <script>

        var foodButtons = document.getElementsByClassName('foodButton');

        function sayHello()
        {
            $('#foodButton').text('Hi there!');
        }
        //wait DOM loaded

        foodButtons.addEventListener('click', function() {
            alert('Hello world');
        }, false);

        foodButtons.addEventListener('click', sayHello());

    </script>

<title>Cash Register</title>
<link rel="stylesheet" type="text/CSS" href="cash_reg.css">
</head>

<body>

<div class="container">
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

        $nums = array("combo1", "combo2", "combo3", "combo4", "combo5", "combo6", "combo7", "combo8", "combo9", "combo10");


        for($i = 0; $i < sizeof($prices); $i++) {
            print "<div id=$names[$i] class='foodButton'>";
            print $names[$i];
            print "</div>";
            print "<br>";
        } // end for()

        print "</div>";

	} // end printComboButtons()


//    function printFoodButtons(){
//
//    }

	printComboButtons($combo);

?>
</div> <!-- End buttonContainer div -->

<div id = "orderContainer" class="orderContainer">
Your orders will be printed here.
</div>

</div> <!-- end container div -->