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
    <!-- <link rel="stylesheet" href="css/logo_style.css"> -->
    <link rel="stylesheet" href="css/search_results.css">
    <link rel="stylesheet" href="css/search_re_style.css">
    <title>検索結果</title>
</head>
<body>
<p class="logo">
        <a href="top.php"><img src="img/logo.png" alt=""></a>
    </p>
        <div class="navi">
        <form method="post" action="search_results.php" class="search_container">
            <input type="text" size="25" placeholder="キーワード検索" name="keyword">
            <input type="submit" value="&#xf002">
        </form>
        <div class="cart-icon">
                <a href="view_cart.php"><img src="img/icon_cart.png" alt="" style="width: 40px;"></a>
        </div>
        <div>
        <input id="menu__toggle" type="checkbox">
        <label class="menu__btn" for="menu__toggle">
        <span></span>
        </label>
        <ul class="menu__box">
            <?php include_once('header.php'); ?>
            <li><a  href="#"></a></li>
            <li><a  href="#"></a></li>
            <li><a  href="login.php"></a></li>
        </ul>
    </div>
    </div>


    <h2 style="text-align: center;">検索結果</h2>
    <div class="results-container">
    <?php
    $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;dbname=LAA1557221-aso2301382;charset=utf8', 'LAA1557221', 'aso12345');

    // if(($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['search'])) or ($_SERVER['PHP_SELF'] === 'search_results.php')){ //検索ボックスからの商品検索
    //     $sql = $pdo->prepare('SELECT * FROM item WHERE item_name LIKE ?');
    //     $sql->execute(['%' . $_SESSION['key'] . '%']);
    //     $results = $sql->fetchAll();
    // }
    // else{ //トップのおすすめを押したとき用
    //     $sql = $pdo->prepare('SELECT * FROM item WHERE tag LIKE ?');
    //     $sql->execute(['秋%']);
    //     $results = $sql->fetchAll();
    // }
//検索ボックスからの商品検索
        if(!isset($_SESSION['key'])){
            $_SESSION['key'] = '';
        }
        $sql = $pdo->prepare('SELECT * FROM item WHERE item_name LIKE ? or tag LIKE ?'); //商品名orタグに部分一致するように検索
        $sql->execute(['%' . $_SESSION['key'] . '%', '%' . $_SESSION['key'] . '%']);
        $results = $sql->fetchAll();



    if (!empty($results)) {
        foreach ($results as $result) {
            echo '<div class="result-item">';
            
            echo '<div class="item-img">';
            echo '<img src="upload/item/',$result['url'],'" alt="" style="width: 100px; height: auto;">';
            echo '</div>';
            
            echo '<p><strong>商品名:</strong> ' . htmlspecialchars($result['item_name']) . '</p>';
            echo '<p><strong>価格:</strong> ￥' . htmlspecialchars(number_format($result['hanbai_tanka'])) . '</p>';
            echo '<form action="addCart.php" method="post">';
            echo '<input type="hidden" name="item_id" value="' . htmlspecialchars($result['item_id']) . '">';
            echo '<label for="amount-' . htmlspecialchars($result['item_id']) . '">数量:</label>';
            echo '<input type="text" id="amount-' . htmlspecialchars($result['item_id']) . '" size="2" name="amount" value="1" min="1" max="99">';
            echo '<input type="submit" value="カートに追加">';
            echo '<input type="hidden" name="result_all">';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo '<p>該当する商品が見つかりませんでした。</p>';
    }
    ?>
</div>

<form method="post" action="view_cart.php">
    <input type="submit" value="カートを見る" class="view-cart-btn">
</form>
</body>
</html>