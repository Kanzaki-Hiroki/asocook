<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/create_account_style.css">
    <title>Document</title>
</head>
<body>
<header style="width: 100%;">
    <div class="logo" id="" style="background-color: #fff85a;">
            <a href="top.php"><img src="img/logo.png" alt=""></a>
    </div>
<!-- </header> -->
    <div class="navi">
        <!-- <form method="post" action="search_results.php" class="search_container fixed">
            <input type="text" size="25" placeholder="キーワード検索" name="keyword">
            <input type="submit" value="&#xf002">
        </form> -->
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
<?php
$pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1557221-aso2301382;charset=utf8',
        'LAA1557221',
        'aso12345');

    $sql = $pdo->prepare('select * from user where email = ?');
    $sql->execute([$_SESSION['id']]);
    $results = $sql->fetchAll();
    foreach($results as $result){
?>
<h1><?= $_SESSION['user_name']?> 様の登録情報</h1>
<div id="account_form" style="margin: auto;">
    <form action="user_changeInfo.php" method="post">
        <p>
            氏名<br>
            <input type="text" name="user_name" value="<?= $result['name']?>" readonly>
        </p>
        <p>
            メールアドレス<br>
            <input type="email" name="email" value="<?= $result['email']?>" readonly>
        </p>
        <p>
            パスワード<br>
            <input type="text" name="pass" value="<?= $result['user_pass']?>" readonly>
        </p>
        <p>
            住所<br>
            <textarea name="address" id="" rows="3" cols="22" readonly><?= $result['address']?></textarea>
        </p>
        <p>
            電話番号<br>
            <input type="tel" name="tel" value="<?= $result['contact']?>" readonly>
        </p>
        <input type="submit" value="修正画面へ">
        <a href="mypage.php">
            <button type="button">戻る</button>
        </a>
    </form>
</div>

    <?php
    }; //foreachの終わり
    ?>
</body>
</html>