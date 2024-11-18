<?php
session_start();

if(!isset($GLOBALS['cart'])){
    $$GLOBALS['cart'];
}
array_push($GLOBALS['cart'], [$_POST['item_id'],$_POST['amount']]);

header('Location: search_results.php');
?>