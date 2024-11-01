<?php
session_start();

$pdo = new PDO('mysql:host=mysql305.phy.lolipop.lan;
dbname=LAA1557204-php2024;charset=utf8',
'LAA1557204',
'Pass0423');

//入力チェック
if(isset($_POST['log_id'])){
    $id = htmlspecialchars($_POST['log_id']);
}
if(isset($_POST['pass'])){
    $pass = htmlspecialchars($_POST['pass']);
}

if(substr($id,0,2) && substr($id,-1,2)){ //管理者IDか判定、管理者IDはある文字の組み合わせ
    $sql = $pdo->prepare('select * from admin where admin_id=? and admin_pass=?');
    $sql->execute([$_POST['log_id'],$_POST['pass']]);
	if($user = $sql->fetch()){
        foreach($user as $u){
            $_SESSION['id'] = $u['admin_id'];
            $_SESSION['pass'] = $u['admin_pass'];
            header('Location: adminTop.html'); //管理者トップ画面に遷移
        }
    }else{ //未登録のID,PASS ログイン画面でエラー表示
        $login_false = true;
        header('Location: login.html');
    }
}else{ //ユーザーテーブルで照合
        $sql = $pdo->prepare('select * from user where user_id=? and user_pass=?');
        $sql->execute([$_POST['log_id'],$_POST['pass']]);
        if($user = $sql->fetch()){
            foreach($user as $u){
                $_SESSION['id'] = $u['user_id'];
                $_SESSION['pass'] = $u['user_pass'];
                header('Location: top.html'); //トップ画面に遷移
            }
        }else{ //未登録のユーザーID/パスワード ログイン画面でエラー表示
            $login_false = true;
            header('Location: login.html');
        }
    }
?>