<?php
session_start();
$namae =$_SESSION['name'];
$comment=$_REQUEST["comment"];
$pass=$_REQUEST["pass"];
$edit=$_REQUEST["edit"];
$delete=$_REQUEST["delete"];
$editmode=$_REQUEST["editmode"];
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
if(strlen($edit)&& !strlen($editmode)){
 try{
  $select = $dbh ->query("SELECT count,comment,img,video FROM bbs");
  while($row = $select -> fetch(PDO::FETCH_BOTH)){
   if($row['img']==0){
    if($edit==$row['count']){
     $editdata=$row['comment'];
     $edita=$edit;
    }
   }else{
    echo("画像、写真の場合は変更ができません。");
   }
  }
 }catch (PDOException $PDOe) {
     echo ($PDOe->getMessage());
 }
}
if(strlen($editmode)&& strlen($comment)&& strlen($edit)&& strlen($pass)){
 try{
  $update = $dbh ->query("UPDATE bbs SET comment ='$comment' WHERE count ='$edit' AND pass ='$pass'");
 }catch (PDOException $PDOe) {
     echo ($PDOe->getMessage());
 }
}
if(strlen($edit)&& strlen($comment)&& strlen($editmode)){
 $editdata="";
 $edit="";
}
?>
<!DOCTYPE html>
<html lang ="ja">
<head>
<meta http-equiv="Content-Type" content="text/html"; charset ="UFT-8">
<title>掲示板</title>
<style></style>
</head>
<body>
<h1>掲示板</h1>
<form action ="bbs.php" method ="post" enctype="multipart/form-data">
<?php if($editdata) :?>
<input type ="hidden" name ="editmode" value="<? echo $edita; ?>"/>
<h2/>編集モード<h2/>
<?php endif; ?>
<h3>名前<h3/><br/>
<h5><? echo $namae ?><h5/><br/>
<h3>コメント<h3/>
<input type ="text" name ="comment" value = "<? echo $editdata; ?>"><br/>
<h3>画像・動画アップデート用<h3/>
<input type= "file" name="pic"/><br/>
<h3>削除対象番号<h3/>
<input type ="text" name ="delete"><br/>
<h3>編集対象番号<h3/>
<input type ="text" name ="edit" value="<? echo $edit; ?>"><br/><br/>
<h3>パスワード<h3/><br/>
<input type ="text" name ="pass"><br/><br/>
<input type ="submit" value ="送信"><br/><br/>
</form>
<form action="bbs.php" method="get" enctype="multipart/form-data">
</form>
<?php
try{
 $stmt = $dbh ->query('CREATE TABLE IF NOT EXISTS bbs(
 count INT(16) NOT NULL,
 namae VARCHAR(255) NOT NULL,
 comment VARCHAR(255) NOT NULL,
 pass VARCHAR(255) NOT NULL,
 pic INT(4) NOT NULL,
 PRIMARY KEY(count)
 )'
);
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
try{
 $stmt = $dbh ->query('CREATE TABLE IF NOT EXISTS picsave(
 count INT(16) NOT NULL,
 pic mediumblob NOT NULL,
 ext VARCHAR(5) NOT NULL,
 PRIMARY KEY(count)
 )'
);
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
if(strlen($namae)&& strlen($comment)&& strlen($pass)&& !strlen($edit)&& !strlen($delete)){
 try{
  $select = $dbh ->query("SELECT count FROM bbs ORDER BY count");
  while($row = $select -> fetch(PDO::FETCH_BOTH)){
   $count =$row['count']+1;
  }
  if(strlen($_FILES["pic"])){
   $picnum=1;
   try{
    $fp=fopen($_FILES["pic"]["tmp_name"],"rb");
    $imgdat = file_get_contents($_FILES["pic"]["tmp_name"]);
    $img = addslashes($imgdat);
    $ext = pathinfo($_FILES["pic"]["name"], PATHINFO_EXTENSION);
   }catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
   }
   try{
    $insert = $dbh ->query("INSERT INTO picsave ( count,pic,ext ) VALUES ('$count','$img','$ext')");
    echo ("読み込み完了");
    echo("<br/>");
   }catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
   }
  }else{
   $picnum=0;
  }
  $insert = $dbh ->query("INSERT INTO bbs (count, namae, comment, pass, pic) VALUES ('$count', '$namae', '$comment', '$pass', '$picnum')");
 }catch (PDOException $PDOe) {
     echo ($PDOe->getMessage());
 }
}
if(strlen($delete)&& strlen($pass)){
 try{
  $delete = $dbh ->query("DELETE FROM kadai15 WHERE count ='$delete' AND pass ='$pass'");
 }catch (PDOException $PDOe) {
     echo ($PDOe->getMessage());
 }
}
try{
 $select = $dbh ->query("SELECT * FROM bbs ORDER BY count");
 while($row = $select -> fetch(PDO::FETCH_BOTH)){
  echo("投稿番号:".$row['count']."<br/>");
  $num=$row['count'];
  echo("名前:".$row['namae']."<br/>");
  echo("コメント:".$row['comment']."<br/>");
  /*echo("パスワード:".$row['pass']."<br/>");*/
  if($row['pic']==1){
   try{
    $sel = $dbh ->query("SELECT count,ext FROM picsave");
    while($row = $sel -> fetch(PDO::FETCH_BOTH)){
    if($num==$row['count']){
     if($row[ext]==jpg or $row[ext]==jpeg or $row[ext]==png or $row[ext]==gif){
      echo ("<img src=\"bbs_img.php?num=".$num."\">");
     }else if($row[ext]==mpeg or $row[ext]==mp4){
      echo("<video src=\"bbs_img.php?num=".$num."\"></video>");
     }
     echo("<br/>");
    }
    }
   }catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
   }
  }
  echo("<br/>");
 }
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
?>
</body>
</html>
