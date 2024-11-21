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
        <div id="">
            <p class="logo">
                <img src="img/logo.png" alt="システムロゴ">
            </p>
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
        // var_dump($_SESSION['cart']);
        if (isset($_SESSION['cart'])) {
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
            foreach ($_SESSION['cart'] as $arr) {
                //foreach ($arr as $id => $amount) {
                    $id = $arr[0];
                    $amount = $arr[1];
                    $sql->execute([$id]);
                    $result = $sql->fetchAll();
                    foreach ($result as $r) {
                        // 商品IDを使ってユニークなIDを生成
                        $uniqueId = 'number-of-unit-' . $r['item_id'];
                        echo '<div class="cart-item">';
                        echo '<div>'.$r['url'].'</div>';  // 商品の画像やURL
                        echo '<div>'.$r['item_name'].'<br>'.$r['hanbai_tanka'].'円</div>';  // 商品名と価格
                        echo '<div class="input-group">
                            <div class="input-group-prepend">
                                    <button type="button" aria-label="減らす" aria-describedby="label-number-of-unit" class="btn btn-outline-dark btn-number rounded-0" data-type="minus" data-field="unit" data-id="'.$r['item_id'].'">
                                    -</button>
                                </div>
                                <input type="number" id="'.$uniqueId.'" name="unit" value="'.$amount.'" min="0" max="100" class="form-control input-number border-dark">
                                <div class="input-group-append">
                                    <button type="button" aria-label="増やす" aria-describedby="label-number-of-unit" class="btn btn-outline-dark btn-number rounded-0" data-type="plus" data-field="unit" data-id="'.$r['item_id'].'">
                                    +</button>
                                </div>
                            </div>';
                            echo '<form action="',$_SERVER['PHP_SELF'],'" method="post">
                            <input type="text" hidden name="count" value="', $count ,'">
                            <input type="text" hidden name="change_amount" value="', $amount ,'">
                            <input type="text" hidden name="item_id" value="', $r['item_id'] ,'">
                            <input type="submit" value="変更">
                            </form>';
                        echo '</div>';
                    }
                //}
            }
        } else {
            echo '<p>カートに商品が入っていません</p>';
        }
        ?>
        <form action="#" method="post">
            <input type="submit" value="レジに進む">
        </form>
        <form action="logout.php" method="post">
            <input type="submit" value="ログアウト">
        </form>
    <script src="./script/script.js"></script>
</body>
</html>