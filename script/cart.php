<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <h1>カート</h1>
    <?php
    $count = count($_SESSION['cart']);
    echo '<h2>カートに入っている商品：', $count, '</h2>'; //カートに追加済の商品点数
    ?>
    </body>
</html>