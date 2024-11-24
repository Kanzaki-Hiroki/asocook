<?php
session_start();

$i = 0;
foreach($_SESSION['cart'] as $arr){
    $btn_id = $arr[0];
    if(isset($_POST["btn-$btn_id"])){
        // echo '該当商品データ：',var_dump($_SESSION['cart'][$i]),'<br>';
        // echo '数量：',$_POST["btn-$btn_id"],'<br>';
        $_SESSION['cart'][$i][1] = $_POST["btn-$btn_id"];
        if (isset($_SESSION['cart'][$i]) && $_POST["btn-$btn_id"] == 0){
            unset($_SESSION['cart'][$i]); // 配列から削除
        }
    }
    $i++;
    }
header('Location: view_cart.php');
?>