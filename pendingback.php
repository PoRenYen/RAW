<?php

session_start();
//<a href="pending.php?prod_id=55">移至我再想想</a>
/**
 *       prod_id
 * [0] => 3 
 * 
 * [2] => 120
 */
$prod_id = $_GET['prod_id']; //55
$objTmp = [];

foreach ($_SESSION['pending'] as $key => $o) {
    if ($o['prod_id'] == $prod_id) { //55
        $objTmp = $o;
        unset($_SESSION['pending'][$key]); //$key => 1
    }
}

$_SESSION['cart'] = array_values($_SESSION['cart']); //[0],[1]
$_SESSION['pending'] = array_values($_SESSION['pending']); //[0],[1]
if (!isset($_SESSION['pending'])) $_SESSION['pending'] = [];
$_SESSION['cart'][] = $objTmp; //[1] => 55


header("location: shoppingcart_think.php");
