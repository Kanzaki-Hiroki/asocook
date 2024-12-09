<?php
$url = $_SERVER['REQUEST_URI']; //現在のURLを取得

if(isset($_SESSION['login_status']) && $_SESSION['login_status'] == true){//ログイン状態
    echo '
        <style>
        .user-icon {
            position: absolute;
            text-align: center;
            margin-top: 0px;
            top: 7px;
            left: 67px;

        }
        </style>

        <div class="user-icon"><img src="img/icon_user.png" alt="" height="60px" width="auto"></div>
        <li><a class="menu__item" href="top.php">トップ</a></li>
        <li><a class="menu__item" href="mypage.php">マイページ</a></li>
        <li><a class="menu__item" href="logout.php">ログアウト</a></li>
    ';
}else{
    echo '
        <li><a class="menu__item" href="top.php">トップ</a></li>
        <li><a class="menu__item" href="login.php">ログイン</a></li>
        ';
}
?>