<?php
session_start();

//$_SESSION['cart']でカートの中身を、$_SESSION['totalAmount']で合計金額を呼び出せる
$cart = $_SESSION['cart'];
$total = $_SESSION['totalAmount'];
$date = date("Y/m/d H:i:s");
$pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1557221-aso2301382;charset=utf8',
'LAA1557221',
'aso12345');

//注文テーブルから現在の注文件数を取得、+1してIDにする
$sql = $pdo->query('select * from order');
$count = $sql->count()


//
$sql = $pdo->prepare("insert into order (order_id, email, total_amount, order_date) values()");
?>