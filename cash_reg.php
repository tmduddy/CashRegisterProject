<!DOCTYPE html>
<html>
<head>
    <script src="jquery-3.2.0.min.js" charset="UTF-8"></script>
    <script>
        window.onload=function(){
            var foodButton = document.getElementsByClassName('foodButton');
            for (var i = 0; i < foodButton.length; i++) {
                foodButton[i].addEventListener("click", showDetails, false);
                foodButton[i].addEventListener('click', colorClass, false);
            }

            var hideOrderDetails = document.getElementById('hideOrderDetails');

            hideOrderDetails.addEventListener('click', hideDetails, false);

            var confirmOrderPart = document.getElementById('confirmOrderPart');

            confirmOrderPart.addEventListener('click', addToOrder, false);
            confirmOrderPart.addEventListener('click', hideDetails, false);
            confirmOrderPart.addEventListener('click', addToArray, false);

            var clearAllOrders = document.getElementById('clearAllOrders');

            clearAllOrders.addEventListener('click', clearOrders, false);
            //clearAllOrders.addEventListener('click', hideDetails, false);
            clearAllOrders.addEventListener('click', returnToNormal, false);

            var drinkButton = document.getElementsByClassName('drinkButton');
            for (var j = 0; j < drinkButton.length; j++) {
                drinkButton[j].addEventListener('click', colorClass, false);
            }


        };

        function colorClass() {
            $(this).toggleClass('back-green');
        }

        function hideDetails() {
            $('#orderDetails').slideUp(300);
        }

        function returnToNormal() {
            $('body').find('back-green').toggleClass('back-green');
        }

        function showDetails() {
            $('#orderDetails').slideDown(300);
        }

        function addToOrder() {
            $('#currentOrder').append(
                "<p> Burger </p>"
            );
        }

        function emptyArray() {
            orders = [];
        }

        function addToArray() {
            var orders = new Array;
            orders.append(item[i], drink[i], size[j], price[i])
        }

        function clearOrders() {
            $('.currentOrder').replaceWith(
                '<div id="currentOrder" class="currentOrder"></div>'
            );
        }

        var price = [
                    6.99,
                    7.99,
                    8.99,
                    7.89,
                    5.99,
                    6.87,
                    6.88,
                    6.89,
                    7.79,
                    5.59];

        var item = ["Quarter Pounder",
                    "Double Quarter Pounder",
                    "Triple Quarter Pounder",
                    "Baconator",
                    "Son of Baconator",
                    "Crispy Chicken Sandwich",
                    "Spicy Chicken Sandwich",
                    "Grilled Chicken Sandwich",
                    "Asiago Chicken Club",
                    "10 Piece Chicken Nugget"];
        var it =

        var drink = ["Coke",
                    "Diet Coke",
                    "Sprite",
                    "Barq's Rootbeer",
                    "Sweet Tea",
                    "Unsweet Tea",
                    "Coffee"];

        var combos = new Array;
        $.get('txt_files/combos.txt', function(data){
            combos = data.split('\n');
        });

        jQuery.each(combos, function (index, value){
            alert(index + ":" + value);
        });


    </script>

<title>Cash Register</title>
<link rel="stylesheet" type="text/CSS" href="cash_reg.css">
</head>

<body>

<div class="container">
<div class="buttonContainer">

<div id="orderDetails" class="orderDetails">
    <?php
    $pathToTxtFiles = '/Applications/XAMPP/xamppfiles/htdocs/CashRegisterProject/txt_files/';

    fopen($pathToTxtFiles . 'drinks.txt', 'r');
    $drinkNamesFile = $pathToTxtFiles . 'drinks.txt';
    $drinkNames = file($drinkNamesFile, FILE_IGNORE_NEW_LINES);

    print "<div class='drinkContainer'>";
        For($i = 0; $i < sizeof($drinkNames); $i++) {
            print "<div id=$drinkNames[$i] class='drinkButton'>";
            print $drinkNames[$i];
            print "</div>";
            print "<br>";
        } // end for()
    print"</div>"; // end drinkContainer div

    print "<div class='sizeContainer'>";
        print "<div class='drinkButton size'>Small</div><br>";
        print "<div class='drinkButton size'>Medium</div><br>";
        print "<div class='drinkButton size'>Large</div><br>";
    print "</div>"; // end sizeContainer div
    ?>
    <div class="finalizeContainer">
    <div id="hideOrderDetails" class="hideOrderDetails">Hide Order Details</div>
    <div id="confirmOrderPart" class="confirmOrderPart">Add to Order</div>
    </div>
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

        $nums = ["combo1",
                    "combo2",
                    "combo3",
                    "combo4",
                    "combo5",
                    "combo6",
                    "combo7",
                    "combo8",
                    "combo9",
                    "combo10"];


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
Your orders will be printed here.<br>
---------------------------------
    <div id="currentOrder" class="currentOrder"></div>
<div id="clearAllOrders" class="clearAllOrders">Clear All Current Orders</div>
</div>

</div> <!-- end container div -->