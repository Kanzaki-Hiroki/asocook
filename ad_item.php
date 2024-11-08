<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>商品管理</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/logo.png" alt="システムロゴ">
        </div>
        <div class="icon">
            <img src="img/icon.png" alt="管理者アイコン">
            <span>ログイン中</span>
        </div>
        <button class="logout-button">ログアウト</button>
    </div>
    <h1>商品検索</h1>

<table class="search-table">
    <thead>
        <tr>
            <th scope="col">商品名</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>売価</td>
            <td>在庫</td>
        </tr>
    </tbody>
</table>

<table class="product-table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">画像</th>
            <th scope="col">商品名</th>
            <th scope="col">原価</th>
            <th scope="col">在庫</th>
            <th scope="col">変更</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>画像</td>
            <td>メークイン</td>
            <td>150</td>
            <td>200</td>
            <td><button class="edit-button">変更</button></td>
        </tr>
    </tbody>
</table>
</body>
</html>