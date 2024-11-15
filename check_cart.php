<?php
// POSTで送信されたカートデータを取得
if (isset($_POST['cart_data'])) {
    $cart_data = json_decode($_POST['cart_data'], true); // JSON文字列を配列にデコード

    // 受け取ったカートデータの内容を表示（デバッグ用）
    echo '<pre>';
    print_r($cart_data);
    echo '</pre>';

    // ここでカート情報をデータベースに保存したり、注文処理を行ったりします

} else {
    echo 'カートデータが送信されていません。';
}
?>