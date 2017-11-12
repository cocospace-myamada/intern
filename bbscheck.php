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
 $select = $dbh ->query('SELECT * FROM bbs ORDER BY count');
 while($row = $select -> fetch(PDO::FETCH_BOTH)){
  echo("count:".$row['count']."<br/>");
  echo("namae:".$row['namae']."<br/>");
  echo("comment:".$row['comment']."<br/>");
  echo("pass:".$row['pass']."<br/>");
  echo("pic:".$row['pic']."<br/>");
  echo("<br/>");
 }
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
?>
