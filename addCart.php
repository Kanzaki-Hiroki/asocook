<?php
session_start();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
$existIdCheck = false;
$i = 0;
$j = 0;
foreach ($_SESSION['cart'] as $arr) {
    $id = $arr[0]; //n個目の商品のID
    if($id == $_POST['item_id']){
        $existIdCheck = true;
        $j = $i;
    }
    $i++;
}
if($existIdCheck){
    $_SESSION['cart'][$j][1] += $_POST['amount'];
}else{
    array_push($_SESSION['cart'], [$_POST['item_id'],$_POST['amount']]);
}
if(isset($_POST['result_all'])){
    header('Location: search_results.php');
}
else if(isset($_POST['result_reco'])){
    header('Location: recommend_result.php');
}

?>
