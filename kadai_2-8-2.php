<?php 
$dsn = '�f�[�^�x�[�X��';
$user='���[�U�[��';
$password='�p�X���[�h';
try{
 $dbh = new PDO($dsn, $user, $password);
}catch (PDOException $e) {
 echo '�f�[�^�x�[�X�ɃA�N�Z�X�ł��܂���' . $e->getMessage();
 exit;
}
$sql = ("CREATE TABLE IF NOT EXISTS 'akadai'(
'ID' VARCHAR(255),
'name' VARCHAR(255),
'comment' VARCHAR(255)
)");
$stmt = $dbh -> prepare($sql);
$stmt -> execute();
$sql = "INSERT INTO 'akadai'('ID','name','comment') 
VALUES ('yamada','yamada','tess')";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$sql = "SELECT * FROM t1";
$stmt = $dbh->prepare($sql);
$stmt->execute();
while ($data = $stmt->fetch()) {
 echo($data['name'] . "<br />");
}
?>


