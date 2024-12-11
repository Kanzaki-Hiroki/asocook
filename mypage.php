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
    <link rel="stylesheet" href="../aso_kanzaki/css/style.css">
    
    <p class="logo">
        <img src="img/logo.png" alt="システムロゴ">
    </p>

    <div class=page>
         <h1>マイページ</h1>
    </div>

    <div class="mypagegazo">
        <img src="img/mypage.png" alt="mypagegazo">
    </div>

    <h2 class="user-name"><?= $_SESSION['user_name'] ?>様</h2>

    <div>
     href="#"><button class="mypage-button">注文履歴</button>
     href="#"><button class="mypage-button">アカウント情報</button>
    </div>

</body>
</html>