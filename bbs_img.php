<?php
 $num=$_GET['num'];
$dsn = '�f�[�^�x�[�X��';
$user='���[�U�[��';
$password='�p�X���[�h';
$dbname = '�f�[�^�x�[�X��';
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
  echo'�f�[�^�x�[�X�ɃA�N�Z�X�ł��܂���'.$e->getMessage();
  exit;
 }
 $select = $dbh ->query("SELECT * FROM picsave ORDER BY count");
 while($row = $select -> fetch(PDO::FETCH_BOTH)){
  if($row[count]==$num){
   header('Content-Type:'.$MIMETypes[$row[ext]]);
   echo($row[pic]);
  }
 }
?>