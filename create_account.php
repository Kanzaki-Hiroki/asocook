<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント登録</title>
</head>
<body>
    <h1>アカウント登録</h1>
    <form action="check_info.php" method="post">
        <p>姓 <br><input type="text" name="last_name"></p>
        <p>名 <br><input type="text" name="first_name"></p>
        <p>メールアドレス<br><input type="email" name="email"></p>
        <p>パスワード<br><input type="password" name="pass"></p>
        <p>パスワード再確認<br><input type="password" name="check_pass"></p>
        <p>住所<br><input type="text" name="address"></p>
        <p>電話番号<br><input type="tel" name="tel"></p>
        <input type="submit" value="確認画面に進む">
    </form>
</body>
</html>