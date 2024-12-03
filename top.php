<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/style.scss"> -->
    <title>トップ</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.png" alt="システムロゴ">
        </div>
        <div class="navi">
            <form method="post" action="search_results.php" class="search_container">
                <input type="text" size="25" placeholder="キーワード検索" name="keyword">
                <input type="submit" value="&#xf002">
            </form>
            <div class="hamburger-menu">
                <input id="menu__toggle" type="checkbox">
                <label class="menu__btn" for="menu__toggle">
                    <span></span>
                </label>
                <ul class="menu__box">
                    <?php
                    // if(isset($_SESSION['login_status']) && $_SESSION['login_status']){
                    //     echo '
                    //     <li><a class="menu__item" href="top.php">トップ</a></li>
                    //     <li><a class="menu__item" href="mypage.php">マイページ</a></li>
                    //     <li><a class="menu__item" href="logout.php">ログアウト</a></li>
                    //     ';
                    // }else{
                    //     echo '
                    //     <li><a class="menu__item" href="top.php">トップ</a></li>
                    //     <li><a class="menu__item" href="login.html">ログイン</a></li>
                    //     ';
                    // }
                    include_once('header.php');
                    ?>
                </ul>
            </div>
        </div>
    </header>
    <img src="./img/catchphrase.png" alt="">
    <form action="login.html"><input type="submit" value="ログイン"></form>
    <form action="logout.php"><input type="submit" value="ログアウト"></form>

    <footer></footer>
</body>
</html>