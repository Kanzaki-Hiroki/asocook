
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>新規追加</title>
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
    <h1>新規追加</h1>
    <form action="ad_item_data.php" method="post" enctype="multipart/form-data">
        <table border="|">
            <tr>
                <tr><td>商品名</td><td><input type="text" name="item"></td></tr>
                <tr><td>画像</td><td><input type="file" name="file"></td></tr>
                <tr><td>売価</td><td><input type="text" name="kakau"></td></tr>
            </tr>
        </table>
        <input type="submit" value="登録する">
    </form>
    <a href="ad_item.php"><button>戻る</button></a>
</body>
</html>