<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p class="logo">
        <img src="img/logo.png" alt="システムロゴ">
    </p>
    <h1>マイページ</h1>

    <?php
    $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1557221-aso2301382;charset=utf8',
'LAA1557221',
'aso12345');

// foreach($pdo->query('select * from user where email = aaaaaa.s.asojuku.ac.jp, user_pass = ssssss') as $row){
//     echo $row['email'], '<br>';
//     echo $row['user_pass'];
// }
?>
    <!-- ここに「ASO COOKにすべておまかせ！」の画像 -->
    <h2><?= $_SESSION['user_name'] ?>様</h2>
<a href="#"><button><img src="./img/clock.jpg" alt="">注文履歴</button></a>
</body>
<?= '<input type="text" value="',$user['name'],'" readonly>';?>
</html>