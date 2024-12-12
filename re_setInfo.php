<?php
session_start();
    //$check_lname = true,
    //$check_fname = true,
    //$_SESSION['check_email'];
//入力チェック
if(isset($_POST['user_name'])){ //氏名
    $name = htmlspecialchars($_POST['user_name']);
}//else{
//     $check_lname = false;
//     header('Location:user_changeInfo.php');
// }
if(isset($_POST['email']) && $_POST['email'] !== $_SESSION['id']){ //メールアドレスがDBの内容と異なる場合
    $email = htmlspecialchars($_POST['email']);
}//else{
//     $check_email = false;
//     header('Location:user_changeInfo.php');
// }

if(isset($_POST['pass'])){ //パスワード
    if($_POST['pass']){}
    $pass = htmlspecialchars($_POST['pass']);
}//else{
//     $check_pass = false;
//     header('Location:user_changeInfo.php');
// }
// if(!isset($_POST['re_pass'])){ //確認用パスワード
//     $equal_pass = false;
//     header('Location:create_account.html');
// }

if(isset($_POST['address'])){ //住所
    $address = htmlspecialchars($_POST['address']);
}//else{
//     $check_address = false;
//     header('Location:user_changeInfo.php');
// }
if(isset($_POST['tel'])){ //電話番号
    $tel = htmlspecialchars($_POST['tel']);
}//else{
//     $check_tel = false;
//     header('Location:user_changeInfo.php');
// }

//DB
$pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1557221-aso2301382;charset=utf8',
'LAA1557221',
'aso12345');

if($_POST['email'] == $_SESSION['id']){
    $sql = $pdo->prepare('update user set name = ?, user_pass = ?, contact = ?, address = ? where email = ?');
    $result = $sql->execute([$name, $pass, $tel, $address, $_SESSION['id']]);
}else{
    $sql = $pdo->prepare('update user set email = ?, name = ?, user_pass = ?, contact = ?, address = ? where email = ?');
    $result = $sql->execute([$email, $name, $pass, $tel, $address, $_SESSION['id']]);
}
$sql = $pdo->prepare('insert into user (email, name, user_pass, contact, address) values(?, ?, ?, ?, ?)');
if($result){
    header('Location: mypage.php');
}
$pdo = null;

?>