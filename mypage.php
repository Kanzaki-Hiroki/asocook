<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../aso_kanzaki/css/style.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php
    $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1557221-aso2301382;charset=utf8',
'LAA1557221',
'aso12345');
?>

<header style="width: 100%;">
    <div class="logo" id="" style="background-color: #fff85a;">
            <a href="top.php"><img src="img/logo.png" alt=""></a>
    </div>
<!-- </header> -->
    <div class="navi">
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox">
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>
            <ul class="menu__box">
                <?php include_once('header.php'); ?>
            </ul>
        </div>
    </div>
</header>
    <!-- <div class="mypagegazo">
        <img src="img/mypage.png" alt="mypagegazo">
    </div> -->
    <div class=page>
        <h1>マイページ</h1>
    </div>

<?php
$sql =$pdo->prepare("select * from user where email = ?");
?>
    <h2 class="user-name"><?= $_SESSION['user_name'] ?> 様</h2>
    <div>
    <a href="order_history.php"><button class="mypage-button">注文履歴</button></a>
    <a href="user_accountInfo.php"><button class="mypage-button">アカウント情報</button></a>
    <!-- <a href="order_history.php"><button class="mypage-button">注文履歴</button></a>
    <a href="akannto.php"><button class="mypage-button">アカウント情報</button></a> -->
</div>
</body>
</html>