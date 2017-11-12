<?php
$dsn = 'データベース名';
$user='ユーザー名';
$password='パスワード';
try{
 $dbh = new PDO($dsn, $user, $password);
}catch (PDOException $e) {
 echo 'データベースにアクセスできません' . $e->getMessage();
 exit;
}
?>

