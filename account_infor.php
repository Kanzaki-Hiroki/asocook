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
            <img src="img/icon.png" alt="管理者アイコン">
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
                echo '<tr><td>パスワード</td><td>', $row['user_pass'],'</td></tr>';
                echo '<tr><td>住所</td><td>', $row['address'], '</td></tr>';
                // echo '<input type="hidden" name="url" value="', $row['url'], '">';
                // echo '<input type="hidden" name="item_id" value="', $row['item_id'], '">'; 
                // echo '<input type="hidden" name="item_name" value="', $row['item_name'], '">';
                // echo '<input type="hidden" name="hanbai_tanka" value="', $row['hanbai_tanka'], '">';
                // echo '<input type="hidden" name="stock" value="', $row['stock'], '">';
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