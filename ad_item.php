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
        <button class="logout-button">ログアウト</button>
    </div>
    <h1>商品検索</h1>
    <?php
        $pdo=new PDO('mysql:host=mysql305.phy.lolipop.lan;
                    dbname=LAA1557210-php2024;charset=utf8',
                    'LAA1557210',
                    'Pass1130');
        
            

            $sql = 'select * from movies';

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            echo '<table border = "|">';

            echo '<tr><th>ID</th><th>画像</th><th>商品名</th><th>売価</th><th>原価</th><th>在庫</th><th>在庫</th></tr>';

            foreach ($stmt as $row){
                echo '<tr>';
                echo '<td>', $row['id'], '</td>';
                echo '<td>', $row['title'], '</td>';
                echo '<td>', $row['release_year'], '</td>';
                echo '<td>', $row['genre'], '</td>';
                echo '<td>', $row['genre'], '</td>';
                echo '<td>', $row['genre'], '</td>';
                echo '<form action="ad_item_data.php" method="post" style="display:inline">';
                echo '<input type="hidden" name="id" value="', $row['id'], '">';
                echo '<input type="hidden" name="title" value="', $row['title'], '">';
                echo '<input type="hidden" name="release_year" value="', $row['release_year'], '">';
                echo '<input type="hidden" name="genre" value="', $row['genre'], '">';
                echo '<td><input type="submit" value="詳細"></td>';
                echo '</form>';
                echo '</tr>';
            }

            echo '</table>';
        $pdo = null;
    ?>
</body>
</html>