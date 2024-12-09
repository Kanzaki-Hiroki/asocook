<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQueryの読み込み -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
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
    <?php
    $cart_tf = false;

        // var_dump($_SESSION['cart']);
        // echo '<br>';
        //カート内のidと数量を取り出す
        $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1557221-aso2301382;charset=utf8',
        'LAA1557221',
        'aso12345');

        $sql = $pdo->prepare('select * from item where item_id = ?');
        $count = 0;

        //echo var_dump($_SESSION['cart']);

        if (isset($_SESSION['cart']) &&(!isset($_SESSION['login_status']) or !isset($_SESSION['id']))) { //カートに追加済＆未ログイン
            foreach ($_SESSION['cart'] as $arr) {
                //var_dump($arr);
                // $id = $arr[0];
                // $amount = $arr[1];
                if(isset($_POST['change_amount']) && isset($_POST['item_id']) && $_POST['item_id'] == $arr[0]){
                    echo $_POST['change_amount'], ':', $_POST['item_id'], ':', $_POST['count'];
                    $arr[1] = $_POST['change_amount'];
                }else{
                    $id = $arr[0];
                    $amount = $arr[1];
                }
                if(isset($_POST['count'])){
                    $count = $_POST['count'];
                }else{
                    $count += $amount;
                }
            }
            echo "<p>カートに入っている商品：$count 点</p>";
            $total = 0; //合計金額を計算する変数
            foreach ($_SESSION['cart'] as $arr) {
                //foreach ($arr as $id => $amount) {
                    $id = $arr[0]; //n個目の商品のID
                    $amount = $arr[1]; //n個目の商品の数量
                    $sql->execute([$id]);
                    $result = $sql->fetchAll();
                    foreach ($result as $r) {
                        echo '<div class="cart-item">';
                        echo '<div><img src="./upload/item/'.$r['url'].'"></div>';
                        echo '<div>'.$r['item_name'].'<br>'.$r['hanbai_tanka'].'円</div>';  // 商品名と価格
                        echo '<form action="changeCartdata.php" method="post">';
                        echo '<select name="btn-',$r['item_id'],'" id="">'; //
                        for($i = 0; $i <= 100; $i++){
                            if($arr[1] == $i){
                                echo '<option value="',$i,'" selected>',$i,'</option>';
                            }else{
                                echo '<option value="',$i,'">',$i,'</option>';
                            }
                        }
                        $total += $r['hanbai_tanka']*$amount;
                        echo '</select>
                            <input type="text" hidden name="count" value="', $count ,'">
                            <input type="text" hidden name="change_amount" value="', $amount ,'">
                            <input type="text" hidden name="item_id" value="', $r['item_id'] ,'">
                            <input type="submit" value="変更">
                            </form>';
                        echo '</div>';
                    }
                //}
            }
            echo "<div><p>合計金額：$total 円</p></div>";
            $_SESSION['totalAmount'] = $total; //合計金額
            echo '<a href="login.php">ログインはこちら</a>';
        }


        else if (isset($_SESSION['cart']) && isset($_SESSION['id'])) { // カート追加済&ログイン中
            foreach ($_SESSION['cart'] as $arr) {
                //var_dump($arr);
                // $id = $arr[0];
                // $amount = $arr[1];
                if(isset($_POST['change_amount']) && isset($_POST['item_id']) && $_POST['item_id'] == $arr[0]){
                    echo $_POST['change_amount'], ':', $_POST['item_id'], ':', $_POST['count'];
                    $arr[1] = $_POST['change_amount'];
                }else{
                    $id = $arr[0];
                    $amount = $arr[1];
                }
                if(isset($_POST['count'])){
                    $count = $_POST['count'];
                }else{
                    $count += $amount;
                }
            }
            echo "<p>カートに入っている商品：$count 点</p>";
            $total = 0; //合計金額を計算する変数
            foreach ($_SESSION['cart'] as $arr) {
                //foreach ($arr as $id => $amount) {
                    $id = $arr[0]; //n個目の商品のID
                    $amount = $arr[1]; //n個目の商品の数量
                    $sql->execute([$id]);
                    $result = $sql->fetchAll();
                    foreach ($result as $r) {
                        echo '<div class="cart-item">';
                        echo '<div><img src="./upload/item/'.$r['url'].'"></div>';
                        echo '<div>'.$r['item_name'].'<br>'.$r['hanbai_tanka'].'円</div>';  // 商品名と価格
                        echo '<form action="changeCartdata.php" method="post">';
                        echo '<select name="btn-',$r['item_id'],'" id="">'; //
                        for($i = 0; $i <= 100; $i++){
                            if($arr[1] == $i){
                                echo '<option value="',$i,'" selected>',$i,'</option>';
                            }else{
                                echo '<option value="',$i,'">',$i,'</option>';
                            }
                        }
                        $total += $r['hanbai_tanka']*$amount;
                        echo '</select>
                            <input type="text" hidden name="count" value="', $count ,'">
                            <input type="text" hidden name="change_amount" value="', $amount ,'">
                            <input type="text" hidden name="item_id" value="', $r['item_id'] ,'">
                            <input type="submit" value="変更">
                            </form>';
                        echo '</div>';
                    }
                //}
            }
            echo "<div><p>合計金額：$total 円</p></div>";
            $_SESSION['totalAmount'] = $total; //合計金額
        }

        else if(!isset($_SESSION['cart']) && (!isset($_SESSION['id'])) ){ //カートが空&未ログイン
            echo '<p>カートに商品が入っていません<br>';
            echo '<a href="login.php">→ログインはこちら</a></p>';
        }
        else { //カートが空&ログイン中
            echo '<p>カートに商品が入っていません</p>';
        }
        ?>
        <?php
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart']) && isset($_SESSION['id'])){ //ログイン中&カートに商品が入っている
            echo '
            <form action="payment.php" method="post">
            <input type="submit" value="レジに進む">
            </form>';
        }else if(!isset($_SESSION['id']) && !empty($_SESSION['cart'])){ //ログイン中&カートが空のときは押せない
            echo '
            <form action="payment.php" method="post">
            <input type="submit" value="レジに進む" disabled>
            </form>';
        }

        ?>

        <form action="search_results.php" method="post">
            <input type="submit" value="戻る">
        </form>
        <br><br>
        <form action="login.html" method="post">
            <input type="submit" value="ログイン">
        </form>
        <form action="logout.php" method="post">
            <input type="submit" value="ログアウト">
        </form>
    <!-- <script src="./script/script.js"></script> -->
    <style>
        .cart-item img {
            width: 100px;
            height: auto;
        }
    </style>
</body>
</html>
