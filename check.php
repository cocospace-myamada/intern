<?php
$name =$_REQUEST["namae"];
$pass =$_REQUEST["pass"];
$pass2 =$_REQUEST["pass2"];
$mail =$_REQUEST["mail"];
$mail2 =$_REQUEST["mail2"];
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
if($pass==$pass2 && $mail==$mail2 && strlen($mail) && strlen($mail2) && strlen($pass) && strlen($pass2) && strlen($name)){
try{
 do{
  $id="";
  $id=$id.chr(rand(48,56));
  $id=$id.chr(rand(48,57));
  $id=$id.chr(rand(48,57));
  $id=$id.chr(rand(48,57));
  $id=$id.chr(rand(48,57));
  $id=$id.chr(rand(48,57));
  try{
   $select = $dbh ->query("SELECT count FROM namesave ORDER BY id");
   $getColumncount = $select->fetchColumn();
  }catch(PDOException $e){
   $error = $e->getMessage();
   $getColumncount = 777;
  }
 }while($getColumncount <= 0);  
}catch (PDOException $PDOe) {
   echo ($PDOe->getMessage());
}
try{
 do{
  $kid="";
  $kid=$kid.chr(57);
  $kid=$kid.chr(rand(48,57));
  $kid=$kid.chr(rand(48,57));
  $kid=$kid.chr(rand(48,57));
  $kid=$kid.chr(rand(48,57));
  $kid=$kid.chr(rand(48,57));
  try{
   $select = $dbh ->query("SELECT count FROM namesave ORDER BY kid");
   $getColumncount = $select->fetchColumn();
  }catch(PDOException $e){
   $error = $e->getMessage();
   $getColumncount = 777;
  }
 }while($getColumncount <= 0);  
}catch (PDOException $PDOe) {
   echo ($PDOe->getMessage());
}
}
?>
<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title>�m�F���</title>
</head>
<body>
<?php if ($pass==$pass2 && $mail==$mail2 && strlen($mail) && strlen($mail2) && strlen($pass) && strlen($pass2) && strlen($name)): ?>
<h1>�m�F���<br/><br/><h1/>
<h2>���[�U�[�o�^���e���m�F���܂��B���e�������Ă���Γo�^�A�ύX������Ζ߂�������Ă��������B<br/><br/><h2/>
<h3>���O�i���[�U�[���ƂȂ�܂��j�F<h3/>
<? echo($name); ?><br/>
<h3>�p�X���[�h�F<h3/>
<? echo($pass); ?><br/>
<h3>�p�X���[�h�F<h3/>
<? echo($mail); ?><br/>
<form action="savedata.php" method ="post">
<input type ="submit" value ="�o�^">
<? $in =1; ?>
<input type ="hidden" name ="namae" value="<? echo ($name); ?>" />
<input type ="hidden" name ="pass" value="<? echo ($pass); ?>" />
<input type ="hidden" name ="mail" value="<? echo ($mail); ?>" />
<input type ="hidden" name ="id" value="<? echo ($id); ?>" />
<input type ="hidden" name ="kid" value="<? echo ($kid); ?>" />
</form>
<?php else: ?>
<h4>�G���[�I�F���O�A�p�X���[�h��������Ɠ��͂��Ă�������<h4/>
<?php if (empty($name)): ?>
<h5>���O�����L���ł��B<h5/>
<?php endif; ?>
<?php if (empty($pass) or empty($pass2)): ?>
<h5>�p�X���[�h�����L���ł��B<br/>�������蓯���p�X���[�h�����Ă��������B<h5/>
<?php endif; ?>
<?php if ($pass!=$pass2): ?>
<h5>�m�F�p�p�X���[�h���Ԉ���Ă��܂��B������x�L�����Ă��������B<h5/>
<?php endif; ?>
<?php if (empty($mail) or empty($mail2)): ?>
<h5>���[���A�h���X�����L���ł��B<br/>�������蓯�����[���A�h���X�����Ă��������B<h5/>
<?php endif; ?>
<?php if ($mail!=$mail2): ?>
<h5>�m�F�p���[���A�h���X���Ԉ���Ă��܂��B������x�L�����Ă��������B<h5/>
<?php endif; ?>
<form action="form.php">
<input type ="submit" value ="�߂�">
</form>
<?php endif; ?>
</body>
</html>
<?php
if($in ==1){
$flag=0;
try{
 $insert = $dbh ->query("INSERT INTO namesave (name, pass, mail, id, kid, flag) VALUES ('$name','$pass','$mail','$id','$kid','$flag')");
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
}
?>