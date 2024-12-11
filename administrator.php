<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>管理者画面</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

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
    <!-- <div class="logo">
        <img src="img/logo.png" alt="システムロゴ">
    </div> -->
    <br><br><br><br>
    <div class="content" onclick="window.location.href='ad_item.php'">商品管理</div>
    <br><br><br><br>
    <div class="content" onclick="window.location.href='user_kannri.php'">ユーザー管理</div>
</body>
</html>


<!-- 
 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>管理者画面</title>
</head>
<body>
    <div class="logo">
        <img src="img/logo.png" alt="システムロゴ">
    </div>
<br><br><br><br>
    <div class="content">
    <button class="btn-home" onclick="window.location.href='ad_item.php'">
        <span class="square-content">商品管理</span>
    </button>
</div>
<br><br><br><br>
<div class="content">
    <button class="btn-home" onclick="window.location.href='user_kannri.php'">
        <span class="square-content">ユーザー管理</span>
    </button>
</div>

</body>
</html>

 -->