<?php
session_start();
$pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1557221-aso2301382;charset=utf8',
'LAA1557221',
'aso12345');

//入力チェック
if(isset($_POST['log_id'])){
    $id = htmlspecialchars($_POST['log_id']);
}
if(isset($_POST['pass'])){
    $pass = htmlspecialchars($_POST['pass']);
}

if(substr($id,0,2) === 'ID' && substr($id,-1,-2) === 'AD'){ //管理者IDか判定、管理者IDはある文字の組み合わせ
    $sql = $pdo->prepare('select * from admin where admin_id=? and admin_pass=?');
    $sql->execute([$_POST['log_id'],$_POST['pass']]);
	if($user = $sql->fetch()){
        foreach($user as $u){
            $_SESSION['id'] = $u['admin_id'];
            $_SESSION['pass'] = $u['admin_pass'];
            header('Location:administrator.php'); //管理者トップ画面に遷移
        }
    }else{ //未登録のID,pass ログイン画面でエラー表示
        $GLOBALS['login_status'] = true;
        header('Location: login.html');
    }
}else{ //ユーザーテーブルで照合
        $sql = $pdo->prepare('select * from user where email=? and user_pass=?');
        $sql->execute([$_POST['log_id'],$_POST['pass']]);
        if($user = $sql->fetchAll()){
            foreach($user as $u){
                $_SESSION['id'] = $u['email']; //メアド
                $_SESSION['pass'] = $u['user_pass']; //パスワード
                $_SESSION['user_name'] = $u['name']; //ユーザー名
                $_SESSION['login_status'] = true; //ログイン状態を記憶
                header('Location: top.php'); //トップ画面に遷移
            }
        }else{ //未登録のユーザーID/パスワード ログイン画面でエラー表示
            $_SESSION['login_status'] = false;
            header('Location: login.html');
        }
    }
?>