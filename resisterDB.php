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
$order_id = $sql->rowCount() + 1;

//現在時刻を取得
$date = date("Y/m/d H:i:s");

//DBに保存 注文テーブルと注文詳細テーブル
$sql = $pdo->prepare("insert into order (order_id, email, total_amount, order_date) values(?, ?, ?, ?)");
$sql->execute([$order_id, $_SESSION['id'],$_SESSION['total_amount'],$date]);

//商品IDを順に保存する配列
$id_arr = [];
//商品IDを順に保存する配列
$qua_arr = [];

foreach ($_SESSION['cart'] as $arr) {
        $id_arr = $arr[0]; //n個目の商品のID
        $qua_arr = $arr[1]; //n個目の商品の数量
    }
echo implode($id_arr),'<br>';
echo implode($qua_arr);
?>