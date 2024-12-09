
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
    <form action="new_item_db.php" method="post" enctype="multipart/form-data"  >
        <table border="|" class="newtable">
            <tr>
                <tr><td>商品名</td><td><input type="text" name="item"></td></tr>
                <tr><td>画像</td><td><input type="file" name="url"></td></tr>
                <tr><td>売価</td><td><input type="text" name="hanbai_tanka"></td></tr>
                <tr><td>在庫</td><td><input type="text" name="stock"></td></tr>
            </tr>
        </table>
        <input type="submit" class= "content" value="登録する">
    </form>
    <!-- <a href="ad_item.php">class="modoru"<button>戻る</button></a> -->
    <div class="content" onclick="window.location.href='ad_item.php'">戻る</div>

</body>
</html>
