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
    $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1557221-aso2301382;charset=utf8',
    'LAA1557221',
    'aso12345');

    $sql = $pdo->prepare('select * from item where item_name LIKE ?');
    $sql->execute(['%'.$_SESSION['key'].'%']);
    $results = $sql->fetchAll();
    foreach($results as $result){
        echo '<p>',$result['item_name'],'</p>';
        echo '<p>￥',$result['hanbai_tanka'],'</p>';
        //<!-- //ここにカート追加機能,js必要かも -->
        echo '<form action="',$_SERVER['PHP_SELF'],'" class="add-to-cart-form" data-item-id="', $result['item_id'], '" data-item-name="', $result['item_name'], '" data-item-price="', $result['hanbai_tanka'], '" method=post>';
            echo '<input type="hidden" name="user" value="',$result['item_id'],'">';
            echo '数量<input type="text" size="2" name="amount" value="1" min="1" max="99" class="amount-input">';
            echo '<input type="submit" class="add-to-cart-btn" value="カートに追加">';
        echo '</form>';
    } //foreachの終わり
    ?>
<form id="cart-form" method="post" action="check_cart.php">
    <!-- カート情報はhiddenフィールドとして送信 -->
    <input type="hidden" name="cart_data" id="cart-data">
    <button type="submit">レジに進む</button>
</form>
<script src="./script/script.js"></script>
    <footer></footer>
</body>
</html>