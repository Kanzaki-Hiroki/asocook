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

//現在時刻を取得
$date = date("Y-m-d H:i:s");
echo var_dump($_SESSION['cart']);

//DBに保存 注文テーブルと注文詳細テーブル
$sql = $pdo->prepare("INSERT INTO `order` (email, total_amount, order_date) VALUES (?, ?, ?)");
$sql->execute([$_SESSION['id'], (int)$_SESSION['totalAmount'], $date]);

//orderテーブルに挿入したorder_idを取得
echo '<br>';
echo '注文ID:',$o_id = $pdo->lastInsertId();
echo '<br>';
$sql = $pdo->prepare("SELECT * from order_detail");
echo '注文詳細ID:',$detail_id = $sql->rowCount() + 1;
echo '<br>';

//注文詳細テーブルに購入データを保存
foreach($_SESSION['cart'] as $arr) {
    echo '商品ID:',$item_id = $arr[0]; //n個目の商品のID
    echo '数量:',$quantity = $arr[1]; //n個目の商品の数量

    $sql = $pdo->prepare('SELECT * from item where item_id = ?');
    $sql->execute([$item_id]);
    $res = $sql->fetchAll();
    foreach($res as $r){
        echo '販売単価:', $tanka = $r['hanbai_tanka'];
    }
    echo '<br>';

    $sql = $pdo->prepare("INSERT INTO `order_detail` (detail_id, order_id, item_id, quantity, subtotal) VALUES (?, ?, ?, ?, ?)");
    $sql->execute([$detail_id, $o_id, $item_id, $quantity, $tanka*$quantity]);
    }

echo '<h2>購入処理が完了しました</h2>';
?>