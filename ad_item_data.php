<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1557221-aso2301382;charset=utf8',
        'LAA1557221',
        'aso12345');
        
        
        if(isset($_POST['item_id'])){
            $item_name = $_POST['item_name'];
            $hanbai_tanka = $_POST['hanbai_tanka'];
            $stock = $_POST['stock'];
            $url = $_FILES['url']["name"];
            
            $sql = $pdo->prepare('insert into item(item_id, item_name, hanbai_tanka, url, stock) values(?, ?, ?, ?, ?)');
            $result = $sql->execute([$name, $comment, $file_names]);
            
            if($result){
                echo 'データが正常に挿入されしました<br>';
            }else{
                echo 'データの挿入に失敗しました<br>';
            }
        }
        
            $file = 'upload/' . basename($_FILES['url']['name']);
            if(move_uploaded_file($_FILES['url']['tmp_name'], $file)){
                
            }else{
                echo 'アップロードに失敗しました。<br>';
            }
        $pdo = null;
        header("Location:ad_item.php");
    ?>
   
</body>
</html>