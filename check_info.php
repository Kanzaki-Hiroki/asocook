<?php
session_start();
    //$check_lname = true,
    //$check_fname = true,
    'check_email' => true
//入力チェック
if(isset($_POST['last_name'])){ //姓
    $lname = htmlspecialchars($_POST['last_name']);
}else{
    $check_lname = false;
    header('Location:create_account.php');
}
if(isset($_POST['first_name'])){ //名
    $fname = htmlspecialchars($_POST['first_name']);
}else{
    $check_fname = false;
    header('Location:create_account.php');
}
if(isset($_POST['email'])){ //メアド
    $email = htmlspecialchars($_POST['email']);
    if(!preg_match("[\w.\-]+@[\w\-]+\.[\w.\-]+",$email)){ //正規表現
        $check_email = false;
        header('Location:create_account.php');
    }
}else{
    $check_email = false;
    header('Location:create_account.php');
}

if(isset($_POST['pass'])){ //パスワード
    //条件に一致するか判定
    if($_POST['pass']){}
    $pass = htmlspecialchars($_POST['pass']);
    if(!preg_match("/^[\x20-\x7E]{6,12}$/",$pass)){ //正規表現
        $check_pass = false;
        header('Location:create_account.php');
    }
}else{
    $check_pass = false;
    header('Location:create_account.php');
}
if(isset($_POST['check_pass'])){ //確認用パスワード
    $check_pass = htmlspecialchars($_POST['check_pass']);
}else{
    $equal_pass = false;
    header('Location:create_account.php');
}

if(isset($_POST['address'])){ //住所
    $address = htmlspecialchars($_POST['address']);
}else{
    $check_address = false;
    header('Location:create_account.php');
}
if(isset($_POST['tel'])){ //電話番号
    $tel = htmlspecialchars($_POST['tel']);
}else{
    $check_tel = false;
    header('Location:create_account.php');
}
?>