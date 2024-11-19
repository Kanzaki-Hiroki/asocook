<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
        <div id="">
            <p class="logo">
                <img src="img/logo.png" alt="システムロゴ">
            </p>
        </div>
        <?php
        var_dump($_SESSION['cart']);
        $cart = $_SESSION['cart'];
        foreach($cart as $c){
            $i = 0;
            for($j = 0; $j < 2; $j++){
                echo $c[$i][$j] , ' ';
                $j++;
            }
            echo '<br>';
            $i++;
        }
        ?>
    </header>
</body>
</html>