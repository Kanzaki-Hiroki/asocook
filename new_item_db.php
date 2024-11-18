<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 接收表單輸入
    $item_name = $_POST['item'] ?? '';
    $price = $_POST['kakau'] ?? '';
    $file = $_FILES['file'] ?? null;

    // 資料驗證
    $errors = [];
    if (empty($item_name)) {
        $errors[] = '商品名を入力してください。';
    }
    if (empty($price) || !is_numeric($price)) {
        $errors[] = '有効な売価を入力してください。';
    }
    if ($file && $file['error'] !== UPLOAD_ERR_OK) {
        $errors[] = '画像のアップロードに失敗しました。';
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<p>' . htmlspecialchars($error) . '</p>';
        }
        echo '<a href="javascript:history.back();">戻る</a>';
        exit;
    }

    // 圖片上傳處理
    $upload_dir = 'upload/';
    $uploaded_file = $upload_dir . basename($file['name']);
    if (!move_uploaded_file($file['tmp_name'], $uploaded_file)) {
        echo '<p>画像のアップロード中にエラーが発生しました。</p>';
        echo '<a href="javascript:history.back();">戻る</a>';
        exit;
    }

    // 儲存到資料庫
    try {
        $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
            dbname=LAA1557221-aso2301382;charset=utf8',
            'LAA1557221',
            'aso12345');

        $sql = 'INSERT INTO item (item_name, url, hanbai_tanka) VALUES (?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$item_name, basename($file['name']), $price]);

        echo '<p>商品が正常に登録されました。</p>';
        echo '<a href="ad_item.php">商品一覧に戻る</a>';
    } catch (PDOException $e) {
        echo '<p>エラー: ' . htmlspecialchars($e->getMessage()) . '</p>';
        echo '<a href="javascript:history.back();">戻る</a>';
    }
} else {
    echo '<p>不正なリクエストです。</p>';
    echo '<a href="ad_item.php">商品一覧に戻る</a>';
}
?>
