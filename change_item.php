<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>商品変更</title>
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
    <h1>商品変更</h1>
    <?php
        $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1557221-aso2301382;charset=utf8',
        'LAA1557221',
        'aso12345');
        
            

            $sql = 'select * from item where item_id=?';

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_POST['item_id']]);

            echo '<table border = "|">';


            foreach ($stmt as $row){
                echo '<form action="ad_item_data.php" method="post" style="display:inline" enctype="multipart/form-data">';
                echo '<tr>';
                echo '<tr><td>画像</td><td><img src="Asocook/upload/', $row['url'], '" width = "100px"></td></tr>';
                echo '<tr><td>変更画像</td><td><input type="file" name="url"></td></tr>';
                echo '<tr><td>商品名</td><td><input type="text" name="item_name" value="', $row['item_name'], '"></td></tr>';
                echo '<tr><td>売価</td><td><input type="text" name="hanbai_tanka" value="', $row['hanbai_tanka'], '"></td></tr>';
                echo '<tr><td>在庫</td><td><input type="text" name="stock" value="', $row['stock'], '"></td></tr>';
                echo '<input type="hidden" name="item_id" value="', $row['item_id'], '">';
                echo '<input type="hidden" name="url" value="', $row['url'], '">';
                echo '<input type="hidden" name="item_name" value="', $row['item_name'], '">';
                echo '</form>';
                echo '</tr>';
            }

            echo '</table>';
        $pdo = null;
    ?>
    
    <a href="ad_item.php"><button>戻る</button></a>
    <a href="ad_item.php"><button>変更する</button></a>
</body>
</html>