<?php
session_start();
if(isset($_POST['keyword'])){
    $_SESSION['key'] = htmlspecialchars($_POST['keyword']);
}
// $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search_re_style.css">
    <title>検索結果</title>
</head>
<body>
<header>
        <p class="logo">
                    <a href="top.php"><img src="img/logo.png" alt=""></a>
                </p>
        <div class="navi">
            <form method="post" action="search_results.php" class="search_container fixed">
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


    <h2>検索結果</h2>
    <?php
    $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1557221-aso2301382;charset=utf8',
    'LAA1557221',
    'aso12345');

    $sql = $pdo->prepare('select * from item where item_name LIKE ?');//DBの商品テーブルにメタタグ列を追加、ここでor検索
    $sql->execute(['%'.$_SESSION['key'] .'%']);
    $results = $sql->fetchAll();
    foreach($results as $result){
        echo '<p>',$result['item_name'],'</p>';
        echo '<p>￥',$result['hanbai_tanka'],'</p>';
        echo '<form action="addCart.php" method=post>';
            echo '<input type="hidden" name="item_id" value="',$result['item_id'],'">';
            echo '数量<input type="text" size="2" name="amount" value="1" min="1" max="99">';
            echo '<input type="submit" value="カートに追加">';
        echo '</form>';
    } //foreachの終わり
    ?>
<form method="post" action="view_cart.php">
    <!-- カート情報はhiddenフィールドとして送信 -->
    <!-- <input type="hidden" name="cart" id="cart-data"> -->
    <input type="submit" value="カートを見る"></input>
</form>
    <footer></footer>
</body>
</html>