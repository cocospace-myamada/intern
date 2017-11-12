<?php
$dsn = 'データベース名';
$user='ユーザー名';
$password='パスワード';
$dbname = 'データベース名';
 $MIMETypes = array(
   'png'  => 'image/png',
   'jpg'  => 'image/jpeg',
   'jpeg' => 'image/jpeg',
   'gif'  => 'image/gif',
   'mpeg'  => 'video/mpeg',
   'mp4'  => 'video/mp4',
 );
 try{
  $dbh=new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch(PDOException $e){
  echo'データベースにアクセスできません'.$e->getMessage();
  exit;
 }
 $select = $dbh ->query("SELECT * FROM picsave ORDER BY count");
 while($row = $select -> fetch(PDO::FETCH_BOTH)){
  if($row[count]==$_GET['num']){
   /*header('Content-Type:'.$MIMETypes[$row[ext]]);
   echo($row[pic]);*/
   echo($_GET['num']);
  }
 }
?>