<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>注文明細</title>
</head>
<body>
<div class="header">
    <div class="logo" style="width: 100%;">
        <img src="img/logo.png" alt="システムロゴ">
    </div>
    <div class="icon">
        <img src="img/icon_user.png" alt="管理者アイコン" style="width: 50px;">
        <span>ログイン中</span>
    </div>
    <a href="logout.php"><button class="logout_button" style="top: 210px;">ログアウト</button></a>
</div>

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

echo '<table border="1" >';
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
<a href="rireki.php"><button class="custom-button">戻る</button></a>
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


