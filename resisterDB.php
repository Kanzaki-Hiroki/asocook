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

// $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
// dbname=	LAA1557204-asocook;charset=utf8',
// 'LAA1557204',
// 'Pass0423');

// //注文テーブルから現在の注文件数を取得、+1してIDにする
// $sql = "SELECT * FROM order";
// $sql = $pdo->query($sql);
// $order_id = $sql->rowCount() + 1;

//現在時刻を取得
$date = date("Y-m-d H:i:s");
echo var_dump($_SESSION['cart']);

//DBに保存 注文テーブルと注文詳細テーブル
$sql = $pdo->prepare("INSERT INTO `order` (email, total_amount, order_date) VALUES (?, ?, ?)");
$sql->execute([$_SESSION['id'], (int)$_SESSION['totalAmount'], $date]);


//商品IDを順に保存する配列
$id_arr = array();
//商品IDを順に保存する配列
$qua_arr = array();
foreach($_SESSION['cart'] as $arr) {
        $id_arr[] = $arr[0]; //n個目の商品のID
        $qua_arr[] = $arr[1]; //n個目の商品の数量
    }
echo var_dump($id_arr),'<br>';
echo var_dump($qua_arr);

//注文詳細テーブルに購入データを保存

?>