<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>アカウント情報</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/logo.png" alt="システムロゴ">
        </div>
        <div class="icon">
        <img src="img/icon_user.png" alt="管理者アイコン" style="width: 50px;">
            <span>ログイン中</span>
        </div>
        <a href=""><button class="logout_button">ログアウト</button></a>
    </div>
    <h1>アカウント情報</h1>
    <?php
        $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1557221-aso2301382;charset=utf8',
        'LAA1557221',
        'aso12345');
        
            

            $sql = 'select * from user where name=?';

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_POST['name']]);

            echo '<table border = "|">';

        
            foreach ($stmt as $row){
                echo '<tr>';
                echo '<tr><td>ユーザー名</td><td>', $row['name'],'</td></tr>';
                echo '<tr><td>メールアドレス</td><td>', $row['email'],'</td></tr>';
                echo '<tr><td>パスワード</td><td>';
                // $count = ;
                for($i = 0; $i < mb_strlen((string)$row['user_pass']); $i++){
                    echo '*';
                }
                '</td></tr>';
                echo '<tr><td>住所</td><td>',$row['address'],'</td></tr>';
                echo '<input type="hidden" name="', $row['name'], '">';
                echo '<input type="hidden" name="', $row['email'], '">';
                echo '<input type="hidden" name="', $row['user_pass'], '">';
                echo '<input type="hidden" name="', $row['address'], '">';
                echo '</form>';
                echo '</tr>';
            }

            echo '</table>';
        $pdo = null;
    ?>
    
    <a href="user_kannri.php"><button>戻る</button></a>
    <!-- <a href="change_item_db.php"><button>変更する</button></a> -->
</body>
</html>