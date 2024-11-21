<?php
session_start();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
//$_SESSION['cart'] = [];
array_push($_SESSION['cart'], [$_POST['item_id'],$_POST['amount']]);
header('Location: search_results.php');

?>
