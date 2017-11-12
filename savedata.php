<?php
$name =$_REQUEST["namae"];
$pass =$_REQUEST["pass"];
$id =$_REQUEST["id"];
$mail =$_REQUEST["mail"];
$kid=$_REQUEST["kid"];
$dsn = 'データベース名';
$user='ユーザー名';
$password='パスワード';
$dbname = 'データベース名';
try{
 $dbh = new PDO($dsn, $user, $password);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
 echo 'データベースにアクセスできません' . $e->getMessage();
 exit;
}
?>
<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UTF-8">
<title>ログイン情報確認</title>
</head>
<body>
<h1>仮登録いたしました。<br/><br/><h1/>
<h2>仮登録いたしました。名前、パスワード、IDをメモしておいてください。<br/><br/><h2/>
<h3>名前（ユーザー名となります）：<h3/>
<? echo($name); ?><br/>
<h3>パスワード：<h3/>
<? echo($pass); ?><br/>
<h3>ID：<h3/>
<? echo($id); ?><br/>
<h2>まだ仮登録の状態です。記入いただいたメールアドレスにメールを送信しています。<br/>そのメールに添付しておりますURLから24時間以内に仮ログインをしてください。<br/><br/><h2/>
<h3>仮ID：<h3/>
<? echo($kid); ?><br/>
<h2>仮ログイン画面にて、仮IDとパスワードを記入してください。<br/><br/><h2/>
</form>
</body>
</html>
<?
mb_language("Japanese");
mb_internal_encoding("UTF-8");
$to=$mail;
$subject = '掲示板本登録について';
$message = '現在仮登録をしています。以下のアドレスに入り、本登録をすませてください。
http://co-656.99sv-coco.com/_kadai3/klogin.php';
$headers = 'From: bbstest.co.jp' . "\r\n";
mb_send_mail($to, $subject, $message, $headers);
?>