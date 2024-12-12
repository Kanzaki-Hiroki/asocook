<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>注文履歴</title>
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
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/logo.png" alt="システムロゴ">
        </div>
        <div class="icon">
            <img src="img/icon.png" alt="管理者アイコン">
            <span>ログイン中</span>
        </div>
        <a href="logout.php"><button class="logout_button">ログアウト</button></a>
    </div>
    <h1>注文履歴</h1>
    <?php
    try {
        
        $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;dbname=LAA1557221-aso2301382;charset=utf8', 'LAA1557221', 'aso12345');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            throw new Exception('メールアドレスが入力されていません。');
        }

        
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('無効なメールアドレス形式です。');
        }

        
        $sql = 'SELECT * FROM `order` WHERE email = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);

        
        echo '<table border="1" >';
        echo '<thead><tr><th>日付</th><th>合計</th><th>詳細</th></tr></thead><tbody>';

        
        $hasData = false;
        foreach ($stmt as $row) {
            $hasData = true;
            $formattedDate = date('Y年m月d日', strtotime($row['order_date']));
            $formattedAmount = number_format($row['total_amount']);
            echo '<tr>';
            echo '<td>', $formattedDate, '</td>';
            echo '<td>', $formattedAmount, '</td>';
            echo '<td>';
            echo '<form action="rireki.php" method="post">';
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
    } catch (Exception $e) {
        echo '<p style="color: red;">エラー: ' . $e->getMessage() . '</p>';
    } finally {
        $pdo = null;
    }
    ?>
    <a href="user_kannri.php"><button>戻る</button></a>
</body>
</html>
