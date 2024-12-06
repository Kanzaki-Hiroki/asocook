<?php
$url = $_SERVER['REQUEST_URI']; //現在のURLを取得

if(isset($_SESSION['login_status']) && $_SESSION['login_status'] == true){//ログイン状態
    echo '
        <img src="/img/icon_user_.png" alt="">
        <li><a class="menu__item" href="top.php">トップ</a></li>
        <li><a class="menu__item" href="mypage.php">マイページ</a></li>
        <li><a class="menu__item" href="logout.php">ログアウト</a></li>
    ';
}else{
    echo '
        <li><a class="menu__item" href="top.php">トップ</a></li>
        <li><a class="menu__item" href="login.html">ログイン</a></li>
        ';
}
?>