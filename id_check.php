<?php
session_start();

$pdo = new PDO('mysql:host=mysql305.phy.lolipop.lan;
dbname=LAA1557204-php2024;charset=utf8',
'LAA1557204',
'Pass0423');

//入力チェック
if(isset($_POST['log_id'])){
    $id = $_POST['log_id'];
}
if(isset($_POST['pass'])){
    $pass = $_POST['pass'];
}

if(substr($id,0,1) && substr($id,-1,1)){ //管理者IDか判定
    $sql = $pdo->prepare('select * from admin where admin_id=? and admin_pass=?');
    $sql->execute([$_POST['log_id'],$_POST['pass']]);
	if($user = $sql->fetch()){
        foreach($user as $u){
            $_SESSION['id'] = $u['admin_id'];
            $_SESSION['pass'] = $u['admin_pass'];
        }
    }else{ //ユーザーテーブルで照合

    }
}
else{
    $login_false = true;
    header('Location: login.html');
}
?>