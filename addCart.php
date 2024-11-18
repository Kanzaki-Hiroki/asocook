<?php
session_start();

if(!isset($GLOBALS['cart'])){
    $_SESSION['cart'] = $GLOBALS['cart'];
}
array_push($GLOBALS['cart'], [$_POST['item_id'],$_POST['amount']]);
$_SESSION['cart'] = $GLOBALS['cart'];
header('Location: search_results.php');
?>