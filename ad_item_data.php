<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        $pdo=new PDO('mysql:host=mysql305.phy.lolipop.lan;
                    dbname=LAA1557210-php2024;charset=utf8',
                    'LAA1557210',
                    'Pass1130');
        
            if(isset($_POST['id'])){
                $id = $_POST['id'];
            }else{
                $id = null;
            }

            if(isset($_POST['title'])){
                $title = $_POST['title'];
            }else{
                $title = null;
            }

            if(isset($_POST['genre'])){
                $genre = $_POST['genre'];
            }else{
                $genre = null;
            }
            if(isset($_POST['release_year'])){
                $release_year = $_POST['release_year'];
            }else{
                $release_year = null;
            }

    ?>
</body>
</html>