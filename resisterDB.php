<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/box_menu.css"> -->
    <!-- <link rel="stylesheet" href="css/style.scss"> -->
    <title>決済完了</title>
</head>
<body>
    <header>
            <p class="logo">
                <a href="top.php"><img src="img/logo.png" alt=""></a>
            </p>
            <div class="hamburger-menu">
                <input id="menu__toggle" type="checkbox">
                <label class="menu__btn" for="menu__toggle">
                    <span></span>
                </label>
                <ul class="menu__box">
                    <?php include_once('header.php'); ?>
                </ul>
            </div>
        </div>
    </header>
<?php
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

//DBに保存 注文テーブルと注文詳細テーブル
$sql = $pdo->prepare("INSERT INTO `order` (email, total_amount, order_date) VALUES (?, ?, ?)");
$sql->execute([$_SESSION['id'], (int)$_SESSION['totalAmount'], $date]);

//orderテーブルに挿入したorder_idを取得
$o_id = $pdo->lastInsertId();
// $sql = $pdo->prepare("SELECT * from order_detail");
// echo '注文詳細ID:',$detail_id = $sql->rowCount() + 1;
// echo '<br>';

//注文詳細テーブルに購入データを保存
foreach($_SESSION['cart'] as $arr) {
    $item_id = $arr[0]; //n個目の商品のID
    $quantity = $arr[1]; //n個目の商品の数量

    $sql = $pdo->prepare('SELECT * from item where item_id = ?');
    $sql->execute([$item_id]);
    $res = $sql->fetchAll();
    foreach($res as $r){
    $tanka = $r['hanbai_tanka'];
    }
    echo '<br>';

    $sql = $pdo->prepare("INSERT INTO `order_detail` ( order_id, item_id, quantity, subtotal) VALUES ( ?, ?, ?, ?)");
    $sql->execute([ $o_id, $item_id, $quantity, $tanka*$quantity]);
    }

echo '<h2>購入処理が完了しました</h2>';
?>
<form action="top.php">
    <input type="submit" value="トップページに戻る">
</form>
</body>
</html>