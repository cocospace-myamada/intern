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
?>
<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title>�V�K�o�^���</title>
</head>
<body>
<form action="check.php" method ="post">
<h1>�V�K�o�^���<br/><br/><h1/>
<h2>���[�U�[�o�^���������܂��B���O�A�p�X���[�h�����Ă��������B<br/><br/><h2/>
<h3>���O�i���[�U�[���ƂȂ�܂��j<h3/>
<input type ="text" name ="namae"><br/>
<h3>�p�X���[�h<h3/><br/>
<input type ="text" name ="pass"><br/><br/>
<h3>�p�X���[�h�i�m�F�j<h3/><br/>
<input type ="text" name ="pass2"><br/><br/>
<h3>���[���A�h���X<h3/><br/>
<input type ="text" name ="mail"><br/><br/>
<h3>���[���A�h���X�i�m�F�j<h3/><br/>
<input type ="text" name ="mail2"><br/><br/>
<input type ="submit" value ="�m�F"><br/>
</form>
</body>
</html>
<?php
try{
 $stmt = $dbh ->query('CREATE TABLE IF NOT EXISTS namesave(
 name VARCHAR(255) NOT NULL,
 pass VARCHAR(255) NOT NULL,
 mail VARCHAR(255) NOT NULL,
 id CHAR(255) NOT NULL,
 kid CHAR(255) NOT NULL,
 flag INT(4) NOT NULL,
 PRIMARY KEY(id)
 )'
);
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
?>