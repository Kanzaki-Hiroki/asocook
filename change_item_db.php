<?php
// 資料庫連線設定
try {
    $pdo = new PDO(
        'mysql:host=mysql309.phy.lolipop.lan;dbname=LAA1557221-aso2301382;charset=utf8',
        'LAA1557221',
        'aso12345'
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    exit('資料庫連線失敗：' . $e->getMessage());
}

// 表單提交處理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // 接收表單資料
        $item_id = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $hanbai_tanka = $_POST['hanbai_tanka'];
        $stock = $_POST['stock'];
        $current_url = $_POST['url']; // 現在的圖片路徑

        // 圖片上傳目錄
        $upload_dir = 'upload/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // 確保目錄存在
        }

        // 檢查是否有上傳新圖片
        if (!empty($_FILES['url']['name'])) {
            $uploaded_file = $_FILES['url']['tmp_name'];
            $file_name = basename($_FILES['url']['name']);
            $file_path = $upload_dir . $file_name;

            // 圖片類型檢查
            $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowed_types)) {
                exit('無效的圖片格式。僅支持 JPG、JPEG、PNG 和 GIF。');
            }

            // 移動圖片並替換舊圖片
            if (move_uploaded_file($uploaded_file, $file_path)) {
                $new_url = $file_name;

                // 如果需要刪除舊圖片，加入以下代碼
                if (!empty($current_url) && file_exists($upload_dir . $current_url)) {
                    unlink($upload_dir . $current_url);
                }
            } else {
                exit('圖片上傳失敗。請檢查目錄權限。');
            }
        } else {
            $new_url = $current_url; // 沒有新圖片時，保留舊圖片
        }

        // 更新資料庫
        $stmt = $pdo->prepare('UPDATE item SET item_name = ?, hanbai_tanka = ?, stock = ?, url = ? WHERE item_id = ?');
        $stmt->execute([$item_name, $hanbai_tanka, $stock, $new_url, $item_id]);

        // 重定向到列表頁
        header('Location: ad_item.php');
        exit;

    } catch (Exception $e) {
        echo 'エラーが発生しました: ' . htmlspecialchars($e->getMessage());
    }
} else {
    echo '不正なリクエストです。';
}
?>
