<?php
$pic=$_POST["pic"];
$video=$_POST["video"];
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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset ="UFT-8">
<title>画像、動画ファイル投稿テスト</title>
<style></style>
</head>
<body>
<form action="display_img.php" method="get" enctype="multipart/form-data">
</form>
<?
try{
 $select = $dbh ->query("SELECT id,ext FROM pictest");
 while($row = $select -> fetch(PDO::FETCH_BOTH)){
  echo($row[id]);
  $id=$row[id];
  echo($row[ext]);
  if($row[ext]==jpg or $row[ext]==jpeg or $row[ext]==png or $row[ext]==gif){
  echo ("<img src=\"get_img.php?id=".$id."\">");
  }else if($row[ext]==mpeg or $row[ext]==mp4){
  echo("<video src=\"get_img.php?id=".$id."\"></video>");
  }
  echo("<br/>");
}
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
?>
</body>
</html>
