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
    <link rel="stylesheet" href="css/payment_style.css">
    <link rel="stylesheet" href="css/logo_style.css">
    <title>会計画面</title>
</head>
<body>
    <div class="logo-container" style="position: static; margin-bottom: 0px;">
        <img src="img/logo.png" alt="システムロゴ">
    </div>

    
    <h1>お支払方法</h1>
    <h2>クレジットカード情報を入力</h2>
    <div>
    <form action="resisterDB.php" method="POST">
        <label for="cardNumber">カード番号</label>
        <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9876 5432" oninput="formatCardNumber(this)" required>
        
        <label for="cardName">カード名義人</label>
        <input type="text" id="cardName" name="cardName" placeholder="山田 太郎" required>
        
        <label for="expirationDate">有効期限</label>
        <input type="month" id="expirationDate" name="expirationDate" required>
        
        <label for="cvv">セキュリティコード (CVV)</label>
        <input type="text" id="cvv" name="cvv" placeholder="123" required>


        <a href="resisterDB.php"><button type="submit">支払いを完了</button></a>
        
    </form>
    <form action="view_cart.php" method="post">
        <input type="submit" value="戻る">
    </form>
    </div>
    <script>

        function formatCardNumber(input) {
            let cardNumber = input.value.replace(/\D/g, '');  
            let formattedCardNumber = cardNumber.replace(/(.{4})(?=.)/g, '$1 ');  
            input.value = formattedCardNumber.slice(0, 19);  
        }
    </script>
</body>
</html>

