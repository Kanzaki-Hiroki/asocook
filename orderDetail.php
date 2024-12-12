<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>注文詳細</title>
</head>
<body>
<header style="width: 100%;">
    <div class="logo" id="" style="background-color: #fff85a;">
            <a href="top.php"><img src="img/logo.png" alt=""></a>
    </div>
<!-- </header> -->
    <div class="navi">
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
//order_idをusr_rireki.phpから受け取る
$order_id = $_POST['order_id'];

$pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1557221-aso2301382;charset=utf8',
'LAA1557221',
'aso12345');

//
$sql = $pdo->prepare('select * from `order_detail` where order_id = ?');
$sql->execute([$order_id]);
$results = $sql->fetchAll();

//商品名検索用のSQL
$item_search = $pdo->prepare('select * from item where item_id = ?');

echo '<table border="1" style="margin-top: 70px;">';
echo '<thead><tr><th>商品名</th><th>数量</th><th>小計</th></tr></thead><tbody>';

if(!empty($results)){ //注文詳細情報が1件以上存在
    foreach($results as $result){
        echo '<tr>';
        $item_search->execute([$result['item_id']]);
        $res = $item_search->fetchAll();
        foreach($res as $r){
            echo '<td>', $r['item_name'], '</td>';
        }
        echo '<td>', $result['quantity'], '</td>';
        echo '<td>', $result['subtotal'], '</td>';
        echo '</tr>';
    }
    echo '</table>';
}else{
    echo '<tr><td colspan="3">注文履歴が見つかりません。</td></tr>';
}
?>
<div style="text-align: center;">
    <a href="order_history.php">
        <button class="custom-button">戻る</button>
    </a>
</div>
<style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: white;
        }
        th, td {
            text-align: left;
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</body>
</html>
