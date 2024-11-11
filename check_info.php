<?php
session_start();
    //$check_lname = true,
    //$check_fname = true,
    //$_SESSION['check_email'];
//入力チェック
if(isset($_POST['last_name'])){ //姓
    $lname = htmlspecialchars($_POST['last_name']);
}else{
    $check_lname = false;
    header('Location:create_account.html');
}
if(isset($_POST['first_name'])){ //名
    $fname = htmlspecialchars($_POST['first_name']);
}else{
    $check_fname = false;
    header('Location:create_account.html');
}
if(isset($_POST['email'])){ //メールアドレス
    $email = htmlspecialchars($_POST['email']);
}else{
    $check_email = false;
    header('Location:create_account.html');
}

if(isset($_POST['pass'])){ //パスワード
    if($_POST['pass']){}
    $pass = htmlspecialchars($_POST['pass']);
}else{
    $check_pass = false;
    header('Location:create_account.html');
}
if(!isset($_POST['re_pass'])){ //確認用パスワード
    $equal_pass = false;
    header('Location:create_account.html');
}

if(isset($_POST['address'])){ //住所
    $address = htmlspecialchars($_POST['address']);
}else{
    $check_address = false;
    header('Location:create_account.html');
}
if(isset($_POST['tel'])){ //電話番号
    $tel = htmlspecialchars($_POST['tel']);
}else{
    $check_tel = false;
    header('Location:create_account.html');
}

//DB
$pdo = new PDO('mysql:host=mysql311.phy.lolipop.lan;
dbname=LAA1557221-php2024;charset=utf8',
'LAA1557221',
'aso12345');

$sql = $pdo->prepare('');
$result = $sql->execute([]);
if($result){
    //echo 'データが正常に挿入されました。<br>';
}
$pdo = null;

?>