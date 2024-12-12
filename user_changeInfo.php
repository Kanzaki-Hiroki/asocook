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
    <title>アカウント情報修正画面</title>
</head>
<body>
<header style="width: 100%;">
    <div class="logo" id="" style="background-color: #fff85a;">
            <a href="top.php"><img src="img/logo.png" alt=""></a>
    </div>
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
<h1>アカウント情報変更</h1>
<div id="account_form" style="margin: auto;">
    <form action="re_setInfo.php" method="post">
        <p>
            氏名<br>
            <input type="text" name="user_name" value="">
        </p>
        <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" v-model="email" required>
        <span v-if="!checkEmail" class="alert_message">メールアドレスを正しく入力してください</span>

        <label for="password">パスワード</label>
            <input type="password" id="password" name="pass" v-model="pass" required>
        <span v-if="!checkPassreg" class="alert_message">半角英数字6文字以上12文字以内で入力してください</span>

        <!-- Confirm Password -->
        <label for="re_password">パスワード再確認</label>
            <input type="password" id="re_password" name="re_pass" v-model="re_pass" required>
        <span v-if="passwordMismatch" class="alert_message">パスワードが一致しません</span>

        <p>
            住所<br>
            <textarea name="address" id="" rows="3" cols="22"><?php if(isset($_POST['address'])){$_POST['address'];}?></textarea>
        </p>
        <label for="tel">電話番号</label>
            <input type="tel" id="tel" name="tel" v-model="tel" placeholder="ハイフンなしで入力してください" required>
            <span v-if="!checkTel" class="alert_message">電話番号を正しく入力してください</span>

            <input type="submit" value="変更を確定する">
        <a href="user_accountInfo.php">
            <button type="button">戻る</button>
        </a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="script/formCheck.js"></script>
</body>
</html>