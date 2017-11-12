<?php
$name =$_POST["namae"];
$pass =$_POST["pass"];
$id =$_POST["id"];
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
try{
 $select = $dbh ->query('SELECT id,ext FROM pictest');
 while($row = $select -> fetch(PDO::FETCH_BOTH)){
  echo("id:".$row['id']."<br/>");
  echo("ext:".$row['ext']."<br/>");
  echo("<br/>");
 }
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
?>
