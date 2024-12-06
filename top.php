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
    <!-- <link rel="stylesheet" href="css/box_menu.css"> -->
    <!-- <link rel="stylesheet" href="css/style.scss"> -->
    <title>トップ</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.png" alt="システムロゴ">
        </div>
        <div class="navi">
            <form method="post" action="search_results.php" class="search_container fixed">
                <input type="text" size="25" placeholder="キーワード検索" name="keyword">
                <input type="submit" value="&#xf002">
            </form>
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
    <p>
        <img src="img/catchphrase.png" alt="">
        <img src="img/ASO CooKa.png" alt="">
        テスト用ボタン<br>
    </p>
    <form action="login.php"><input type="submit" value="ログイン"></form>
    <form action="logout.php"><input type="submit" value="ログアウト"></form>
    <footer></footer>

    <script>
    window.addEventListener('scroll', function() {
    var navi = document.querySelector('.navi'); // .navi要素を取得
    var searchBox = document.querySelector('.search_container');
    var hamburgerMenu = document.querySelector('.hamburger-menu');

    if (window.scrollY > 200) {
        navi.classList.add('fixed'); // .naviにfixedクラスを追加
        searchBox.classList.add('fixed');  // 検索ボックスにfixedクラスを追加
        hamburgerMenu.classList.add('fixed');  // ハンバーガーメニューにfixedクラスを追加
    } else {
        navi.classList.remove('fixed'); // .naviからfixedクラスを削除
        searchBox.classList.remove('fixed');
        hamburgerMenu.classList.remove('fixed');
    }
});
</script>

</body>
</html>