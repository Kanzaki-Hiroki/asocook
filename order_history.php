<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/create_account_style.css">
    <title>注文履歴</title>
</head>
<body>
<header style="width: 100%;">
    <div class="logo" id="" style="background-color: #fff85a;">
            <a href="top.php"><img src="img/logo.png" alt=""></a>
    </div>
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

$pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1557221-aso2301382;charset=utf8',
'LAA1557221',
'aso12345');

$sql = 'SELECT * FROM `order` WHERE email = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['id']]);

    echo '<h2 style="text-align:center; margin-top:50px;">注文履歴</h2>';

    echo '<table border="1" style="margin-top:20px; max-width: 700px;">';
    echo '<thead><tr><th>日付</th><th>合計</th><th>詳細</th></tr></thead><tbody>';
    $hasData = false;
    foreach ($stmt as $row) {
        $hasData = true;
        $formattedDate = date('Y年m月d日', strtotime($row['order_date']));
        $formattedAmount = number_format($row['total_amount']);
        echo '<tr>';
        echo '<td>', $formattedDate, '</td>';
        echo '<td>￥', $formattedAmount, '</td>';
        echo '<td>';
        echo '<form action="orderDetail.php" method="post">';
        echo '<input type="hidden" name="order_id" value="', $row['order_id'], '">';
        echo '<input type="submit" value="詳細">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    if (!$hasData) {
        echo '<tr><td colspan="3">注文履歴が見つかりません。</td></tr>';
    }
    echo '</tbody></table>';
?>
<div style="text-align: center;">
    <a href="mypage.php" style="">
        <button type="button" style="width: 550px;">戻る</button>
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