<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>ログイン画面</title>
</head>
<body>
    <header>
        <div id="">
            <p class="logo">
                <img src="img/logo.png" alt="">
            </p>
        </div>
    </header>
    <h2>ログイン</h2>
    <form action="id_check.php" method="post">
        メールアドレス <br>
        <input type="text" name="log_id"><br>
        <?php
        require_once('id_check.php');
        if(isset($login_false)){
            echo '<span style="color: red">メールアドレスまたはパスワードが間違っています</span>';
        }
        ?>
        パスワード <br>
        <input type="text" name="pass"><br>
        <p><input type="submit" value="ログインする"></p>
    </form>
    <form action="#" method="post">
        <input type="submit" value="新規登録はこちら">
    </form>
</body>
</html>