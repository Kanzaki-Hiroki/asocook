<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>会計画面</title>
</head>
<body>
<div class="logo">
        <img src="img/logo.png" alt="システムロゴ">
    </div>

    <div class="navi">
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox">
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>
            <ul class="menu__box">
                <li><a class="menu__item" href="#">Home</a></li>
                <li><a class="menu__item" href="#">About</a></li>
                <li><a class="menu__item" href="login.php">ログイン</a></li>
            </ul>
        </div>
    </div>

    <h1>お支払方法</h1>
    <select name="" id="">
        <option value=""></option>
    </select>

    <form action="login.html"><input type="submit" value="ログイン"></form>
    <form action="logout.php"><input type="submit" value="ログアウト"></form>
    <form action="view_cart.php" method="post">
        <input type="submit" value="戻る">
    </form>
</body>
</html>