<?php
$kid =$_REQUEST["kid"];
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
if(isset($_REQUEST["klogin"])){
 if(empty($kid)){
  echo("��ID�������͂ł��B");
 }else if(empty($pass)){
  echo("�p�X���[�h�������͂ł��B");
 }
 if(!empty($kid) && !empty($pass)) {
  try{
   $select = $dbh ->query("SELECT * FROM namesave ORDER BY  pass, kid, flag");
   while($row = $select -> fetch(PDO::FETCH_BOTH)){
    if($row['kid']==$kid && $row['pass']==$pass){
     try{
      $update = $dbh ->query("UPDATE namesave SET flag =1 WHERE pass ='$row[pass]' AND kid ='$row[kid]'");
      $login=1;
     }catch (PDOException $PDOe) {
      echo ($PDOe->getMessage());
     }
    }
   }
  }catch (PDOException $PDOe) {
     echo ($PDOe->getMessage());
  }
 }else{
  echo("ID�A�������̓p�X���[�h���Ԉ���Ă��܂��B");
 }
}
?>
<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title>�����O�C�����</title>
<style></style>
</head>
<body>
<h1>�����O�C�����<h1/>
<form action ="klogin.php"  method="post">
<div style="text-align : left">
<h6>��ID<h6/>
<input type ="text" name ="kid"><br/>
<h6>�p�X���[�h<h6/><br/>
<input type ="text" name ="pass"><br/><br/>
<input type ="submit" name="klogin" value ="�����O�C��">
</form>
</form>
</body>
</html>
<?php
if($login==1) {
 header("Location: login.php");
 exit;
}
?>