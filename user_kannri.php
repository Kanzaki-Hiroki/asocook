
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>ユーザー管理</title>
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
        <a href=""><button class="logout_button">ログアウト</button></a>
    </div>
    <h1>ユーザー管理</h1>
    <?php
        $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1557221-aso2301382;charset=utf8',
        'LAA1557221',
        'aso12345');
        
            

            $sql = 'select * from user';

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            echo '<table border = "|" class="usertable">';
            echo '<tr><th>ユーザー名</th><th>メールアドレス</th><th>注文</th><th>情報</th></tr>';

            foreach ($stmt as $row){
                
                echo '<tr>';
                echo '<td>', $row['name'], '</td>';
                echo '<td>', $row['email'], '</td>';
                echo '<form action="rireki.php" method="post">';
                echo '<td><input type="submit" value="履歴" name="rireki"></td>';
                echo '<input type="hidden" name="email" value="', $row['email'], '">';
                echo '</form>';
                echo '<form action="account_infor.php" method="post">';
                echo '<td><input type="submit" value="詳細" name="syosai"></td>';
                echo '<input type="hidden" name="name" value="', $row['name'], '">';
                echo '</form>';
                echo '</tr>';
            }

            echo '</table>';
        $pdo = null;
    ?>
<a href="administrator.php"><button class="custom-button">戻る</button></a>
    
</body>
</html>