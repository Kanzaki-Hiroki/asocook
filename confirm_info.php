<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="logo">
        <img src="img/logo.png" alt="システムロゴ">
    </div>
    <form action="set_accountInfo.php" method="post">
        <p>
            姓<br>
            <input type="text" name="last_name" value="<?= $_POST['last_name']?>" readonly>
        </p>
        <p>
            名<br>
            <input type="text" name="first_name" value="<?= $_POST['first_name']?>" readonly>
        </p>
        <p>
            メールアドレス<br>
            <input type="email" name="email" value="<?= $_POST['email']?>" readonly>
        </p>
        <p>
            パスワード<br>
            <input type="password" name="pass" value="<?= $_POST['pass']?>" readonly>
        </p>
        <p>
            住所<br>
            <textarea name="address" id="" rows="3" cols="22" readonly><?= $_POST['address']?></textarea>
        </p>
        <p>
            電話番号<br>
            <input type="tel" name="tel" value="<?= $_POST['tel']?>" readonly>
        </p>
        <button onclick="history.back()" false>戻る</button>
        <input type="submit" value="登録する">
    </form>
</body>
</html>