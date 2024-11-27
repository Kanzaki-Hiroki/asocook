<?php
// 啟用錯誤報告
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 資料庫連接
$pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1557221-aso2301382;charset=utf8',
        'LAA1557221',
        'aso12345');

// 表單提交檢查
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item'])) {
    $itemName = $_POST['item'];
    $hanbai_tanka = $_POST['hanbai_tanka'];
    $stock = $_POST['stock'];
    $url = ''; // 預設圖片 URL 為空

    // 初始化上傳狀態
    $uploadOk = 1;

    // 圖片上傳處理
    if (isset($_FILES['url']) && $_FILES['url']['error'] === UPLOAD_ERR_OK) {
        

        $originalName = basename($_FILES['url']['name']); // 獲取原始檔名
        $targetFile = $originalName;

        // 檢查文件類型
        $imageFileType = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedTypes)) {
            error_log("無效的文件類型：$imageFileType");
            $uploadOk = 0;
        }

        // 嘗試移動上傳文件
        if ($uploadOk) {
            if (move_uploaded_file($_FILES['url']['tmp_name'], $targetFile)) {
                $url = $targetFile; // 成功上傳後更新 URL
            } else {
                error_log("圖片移動失敗，檢查目錄權限。");
                exit;
            }
        } else {
            error_log("無效的圖片文件。");
            exit;
        }
    } else {
        error_log("圖片上傳失敗，錯誤代碼：" . $_FILES['url']['error']);
        exit;
    }

    // 獲取當前最大 item_id
    $stmt = $pdo->query("SELECT MAX(item_id) AS max_id FROM item");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $newItemId = ($row['max_id'] ?? 0) + 1;

    // 將新商品插入資料庫
    $stmt = $pdo->prepare("INSERT INTO item (item_id, item_name, hanbai_tanka, stock, url) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$newItemId, $itemName, $hanbai_tanka, $stock, $url])) {
        header('Location: ad_item.php'); // 成功後跳轉
        exit;
    } else {
        error_log("資料庫插入失敗：" . implode(", ", $stmt->errorInfo()));
        exit;
    }
} else {
    error_log("無效的請求方法或缺少必要的參數。");
    exit;
}
