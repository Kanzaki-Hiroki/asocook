<?php
// データベース接続
$pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1557221-aso2301382;charset=utf8',
        'LAA1557221',
        'aso12345');

// フォーム送信を確認
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemName = $_POST['item'] ?? '';
    $hanbai_tanka = $_POST['kakau'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $url = '';

    // 画像がアップロードされているか確認
    if (isset($_FILES['url']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'upload/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $fileName = uniqid('img_') . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadDir . $fileName);
        $url = $uploadDir . $fileName;
    }

    // 現在の最大 item_id を取得
    $stmt = $pdo->query("SELECT MAX(item_id) AS max_id FROM item");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $newItemId = ($row['max_id'] ?? 0) + 1; // テーブルが空の場合は 1 から開始

    // 新しいデータを挿入
    $stmt = $pdo->prepare("INSERT INTO item (item_id, item_name, hanbai_tanka, stock, url) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$newItemId, $itemName, $hanbai_tanka, $stock, $url]);

    // 成功後、自動リダイレクト
    header('Location: ad_item.php');
    exit;
} else {
    echo '無効なリクエストです。';
}
?>
