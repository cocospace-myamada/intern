<?php
$id =$_REQUEST["ID"];
$pass =$_REQUEST["pass"];
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
?>
<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title>���O�C�����</title>
<style></style>
</head>
<body>
<h1>���O�C�����<h1/>
<form action="form.php" method ="post">
<div style="text-align : right">
<input type ="submit" value ="���[�U�[�o�^�y�[�W�ֈړ�">
</form>
<form action ="login.php"  method="post">
<div style="text-align : left">
<h6>ID<h6/>
<input type ="text" name ="id" value="<? echo $id ?>"><br/>
<h6>�p�X���[�h<h6/><br/>
<input type ="text" name ="password" value="<? echo $pass ?>"><br/><br/>
<input type ="submit" name="login" value ="���O�C��">
</form>
</form>
</body>
</html>
<?
$id2 =$_REQUEST["id"];
$pass2 =$_REQUEST["password"];
echo($id2);
if(isset($_REQUEST["login"])){
 if(empty($id2)){
  echo("ID�������͂ł��B");
 }else if(empty($pass2)){
  echo("�p�X���[�h�������͂ł��B");
 }
 if(!empty($id2) && !empty($pass2)) {
  try{
   $select = $dbh ->query("SELECT * FROM namesave ORDER BY name, pass, id, flag");
   while($row = $select -> fetch(PDO::FETCH_BOTH)){
    if($row['id']==$id2 && $row['pass']==$pass2 && $row['flag']==1){
     $name=$row['name'];
     setcookie('ID',$id,time()+60*60*24*7);
     setcookie('pass',$pass,time()+60*60*24*7); 
     session_start();
     $_SESSION['name']=$name;
     echo("in");
     $login=1;
    }
   }
  }catch (PDOException $PDOe) {
     echo ($PDOe->getMessage());
  }
 }else{
  echo("ID�A�������̓p�X���[�h���Ԉ���Ă��܂��B");
 }
}
if($login==1) {
 header("Location: bbs.php");
 exit;
}
?>