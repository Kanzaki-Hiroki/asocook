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
    <link rel="stylesheet" href="logo_style.css">
    <link rel="stylesheet" href="css/login_style.css">
    <title>ログイン画面</title>
</head>
<body>
<header style="width: 100%;">
    <div class="logo" id="" style="background-color: #fff85a;">
            <a href="top.php"><img src="img/logo.png" alt=""></a>
    </div>
</header>
    <div id="account_form" style="box-shadow: rgba(0, 0, 0, 0.3) 0px 2px 4px; padding: 0px 50px 30px 50px; margin-top: 30px; border-radius: 15px;">
        <h2>ログイン</h2>
        <form action="login_check.php" method="post">
            <p>メールアドレス <br>
                <input type="text" name="log_id" v-model="email"><br>
                <span v-if="!checkEmail" class="alert_message">メールアドレスを入力してください</span></p>
            <p>パスワード <br>
                <input type="password" name="pass" v-model="pass"><br>
                <span v-if="!checkPassreg" class="alert_message">半角英数字6文字以上12文字以内で入力してください</span>
            </p>
            <p><input type="submit" value="ログインする"></p>
        </form>
        <form class="to-cAccount" action="create_account.html" method="post">
            <input type="submit" value="新規登録はこちら">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="./script/formCheck.js"></script>
</body>
</html>