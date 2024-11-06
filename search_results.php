<?php
session_start();
if(isset($_POST['keyword'])){
    $_SESSION['key'] = htmlspecialchars($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>検索結果</title>
</head>
<body>
    <header>
        <div id="">
            <p class="logo">
                <img src="img/logo.png" alt="システムロゴ">
            </p>
        </div>
    </header>
    <div class="navi">
        <form method="get" action="search_results.php" class="search_container">
            <input type="text" size="25" placeholder="キーワード検索">
            <input type="submit" value="&#xf002">
        </form>
        <div class="hamburger-menu">
            <label class="menu__btn" for="menu__toggle">
            <span></span>
            </label>
            <ul class="menu__box">
                <li><a class="menu__item" href="#">Home</a></li>
                <li><a class="menu__item" href="#">About</a></li>
                <li><a class="menu__item" href="login.php">ログイン</a></li>
                <li><a class="menu__item" href="#">Contact</a></li>
                <li><a class="menu__item" href="#">Twitter</a></li>
            </ul>
        </div>
    </div>

    <h2>検索結果</h2>
    <?php
    $pdo = new PDO('mysql:host=mysql305.phy.lolipop.lan;
    dbname=LAA1557204-php2024;charset=utf8',
    'LAA1557204',
    'Pass0423');

    $sql = $pdo->prepare('select * from item where item LIKE ?');
    $sql->execute(['%'.$_SESSION['key'].'%']);
    $results = $sql->fetchAll();
    foreach($results as $result){
        echo '<p>',$result['item_name'],'</p>';
        echo '<p>',$result['hanbai_tanka'],'</p>';
        //<!-- //ここにカート追加機能,js必要かも -->
        echo '<form action="#">';
            echo '<input type="hidden" name="user" value="',$result['item_id'],'">';
            echo '数量<input type="text"　size="2" name="kosuu" value="1">';
            echo '<input type="submit" value="カートに追加">';
        echo '</form>';
    } //forearchの終わり
    ?>
    <footer></footer>
</body>
</html>