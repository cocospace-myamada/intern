<?php
$namae =$_REQUEST["namae"];
$comment=$_REQUEST["comment"];
$pass=$_REQUEST["pass"];
$edit=$_REQUEST["edit"];
$delete=$_REQUEST["delete"];
$editmode=$_REQUEST["editmode"];
$dsn = '�f�[�^�x�[�X��';
$user='���[�U�[��';
$password='�p�X���[�h';
$dbname = '�f�[�^�x�[�X��';
try{
 $dbh = new PDO($dsn, $user, $password);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
 echo '�f�[�^�x�[�X�ɃA�N�Z�X�ł��܂���' . $e->getMessage();
 exit;
}
if(strlen($edit)&& !strlen($editmode)){
 try{
  $select = $dbh ->query("SELECT count,comment FROM kadai15");
  while($row = $select -> fetch(PDO::FETCH_BOTH)){
   if($edit==$row['count']){
    $editdata=$row['comment'];
    $edita=$edit;
   }
  }
 }catch (PDOException $PDOe) {
     echo ($PDOe->getMessage());
 }
}
if(strlen($editmode)&& strlen($comment)&& strlen($edit)&& strlen($pass)){
 try{
  $update = $dbh ->query("UPDATE kadai15 SET comment ='$comment' WHERE count ='$edit' AND pass ='$pass'");
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
<meta charset ="UFT-8">
<title></title>
</head>
<body>
<h1>���̓t�H�[��</h1>
<form action ="kadai_2-15.php" method ="post">
<?php if($editdata) :?>
<input type ="hidden" name ="editmode" value="<? echo $edita; ?>"/>
<h2/>�ҏW���[�h<h2/>
<?php endif; ?>
<h3>���O<h3/>
<input type ="text" name ="namae"><br/>
<h4>�R�����g<h4/>
<input type ="text" name ="comment" value = "<? echo $editdata; ?>"><br/>
<h5>�폜�Ώ۔ԍ�<h5/>
<input type ="text" name ="delete"><br/>
<h6>�ҏW�Ώ۔ԍ�<h6/>
<input type ="text" name ="edit" value="<? echo $edit; ?>"><br/><br/>
<h7>�p�X���[�h<h7/><br/>
<input type ="text" name ="pass"><br/><br/>
<input type ="submit" value ="���M"><br/>
</form>
</body>
</html>
<?php 
try{
 $stmt = $dbh ->query('CREATE TABLE IF NOT EXISTS kadai15(
 count INT(16),
 namae VARCHAR(255),
 comment VARCHAR(255),
 pass VARCHAR(255),
 PRIMARY KEY(count)
 )'
);
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
if(strlen($namae)&& strlen($comment)&& strlen($pass)&& !strlen($edit)&& !strlen($delete)){
 try{
  $select = $dbh ->query("SELECT count FROM kadai15 ORDER BY count");
  while($row = $select -> fetch(PDO::FETCH_BOTH)){
   $count =$row['count']+1;
  }
  $insert = $dbh ->query("INSERT INTO kadai15 (count, namae, comment, pass) VALUES ('$count', '$namae', '$comment', '$pass')");
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
 $select = $dbh ->query("SELECT * FROM kadai15 ORDER BY count");
 while($row = $select -> fetch(PDO::FETCH_BOTH)){
  echo("���e�ԍ�:".$row['count']."<br/>");
  echo("���O:".$row['namae']."<br/>");
  echo("�R�����g:".$row['comment']."<br/>");
  echo("�p�X���[�h:".$row['pass']."<br/>");
  echo("<br/>");
 }
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
?>
