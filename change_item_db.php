<?php
// 資料庫連線設定
$pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1557221-aso2301382;charset=utf8',
        'LAA1557221',
        'aso12345');

// 表單提交處理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // 接收表單資料
        $item_id = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $hanbai_tanka = $_POST['hanbai_tanka'];
        $stock = $_POST['stock'];
        $current_url = $_POST['url']; // 現在的圖片路徑

        // 檢查是否有上傳新圖片
        if (!empty($_FILES['url']['name'])) {
            $upload_dir = 'upload/';
            $uploaded_file = $_FILES['url']['tmp_name'];
            $file_name = basename($_FILES['url']['name']);
            $file_path = $upload_dir . $file_name;

            // 上傳圖片並替換舊圖片
            if (move_uploaded_file($uploaded_file, $file_path)) {
                $new_url = $file_name;
            } else {
                echo '画像のアップロードに失敗しました。';
                exit;
            }
        } else {
            $new_url = $current_url; // 如果沒有新圖片，使用舊圖片
        }

        // 更新資料庫
        $stmt = $pdo->prepare('UPDATE item SET item_name = ?, hanbai_tanka = ?, stock = ?, url = ? WHERE item_id = ?');
        $stmt->execute([$item_name, $hanbai_tanka, $stock, $new_url, $item_id]);

        header('Location: ad_item.php');

    } catch (Exception $e) {
        echo 'エラーが発生しました: ' . $e->getMessage();
    }
} else {
    echo '不正なリクエストです。';
}
?>
