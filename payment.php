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
                    <?php include_once('header.php'); ?>
                </ul>
            </div>
        </div>
    </header>

    <h1>お支払方法</h1>
    <h2>クレジットカード情報を入力</h2>
    <form action="resisterDB.php" method="POST">
    <p>
        <label for="cardNumber">カード番号</label>
        <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9876 5432" oninput="formatCardNumber(this)" required>
    </p>

    <p>
        <label for="cardName">カード名義人</label>
        <input type="text" id="cardName" name="cardName" placeholder="山田 太郎" required>
    </p>

    <p>
        <label for="expirationDate">有効期限</label>
        <input type="month" id="expirationDate" name="expirationDate" required>
    </p>
    <p>
        <label for="cvv">セキュリティコード (CVV)</label>
        <input type="text" id="cvv" name="cvv" placeholder="123" required>
    </p>

    <!-- <a href="resisterDB.php"><button type="submit">支払いを完了</button></a> 購入データをDBに登録 -->
    <input type="submit" value="支払いを完了する">
</form>

<script>
    // カード番号を4桁ごとに区切る関数
    function formatCardNumber(input) {
        // 入力値から数字のみを抽出
        let cardNumber = input.value.replace(/\D/g, '');

        // 4桁ごとに区切る
        let formattedCardNumber = cardNumber.replace(/(.{4})(?=.)/g, '$1 ');

        // 最大19文字まで入力できるように制限（16桁のカード番号 + 3つのスペース）
        input.value = formattedCardNumber.slice(0, 19);
    }
</script>

<br>
    <form action="login.html"><input type="submit" value="ログイン"></form>
    <form action="logout.php"><input type="submit" value="ログアウト"></form>
    <form action="view_cart.php" method="post">
        <input type="submit" value="戻る">
    </form>
</body>
</html>