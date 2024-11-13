
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>商品管理</title>
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
    <h1>商品検索</h1>
    <?php
        $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1557221-aso2301382;charset=utf8',
        'LAA1557221',
        'aso12345');
        
            

            $sql = 'select * from item';

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            echo '<table border = "|">';

            echo '<tr><th>ID</th><th>画像</th><th>商品名</th><th>売価</th><th>在庫</th><th>変更</th></tr>';

            foreach ($stmt as $row){
                echo '<tr>';
                echo '<td>', $row['item_id'], '</td>';
                echo '<td><img src="upload/', $row['url'], '" width = "100px"></td>';
                echo '<td>', $row['item_name'], '</td>';
                echo '<td>', $row['hanbai_tanka'], '</td>';
                echo '<td>', $row['stock'], '</td>';
                echo '<form action="ad_item_data.php" method="post" style="display:inline">';
                echo '<input type="hidden" name="item_id" value="', $row['item_id'], '">';
                echo '<input type="hidden" name="url" value="', $row['url'], '">';
                echo '<input type="hidden" name="item_name" value="', $row['item_name'], '">';
                echo '<input type="hidden" name="stock" value="', $row['stock'], '">';
                echo '<td><input type="submit" value="変更"></td>';
                echo '</form>';
                echo '</tr>';
            }

            echo '</table>';
        $pdo = null;
    ?>
    <a href="administrator.php"><button>戻る</button></a>
    <a href="new_item.php"><button>新規登録</button></a>
</body>
</html>