<?php 
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
try{
 $stmt = $dbh ->query('CREATE TABLE IF NOT EXISTS dkadai(
 ID VARCHAR(255),
 name VARCHAR(255),
 comment VARCHAR(255),
 PRIMARY KEY(ID)
 )'
);
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
try{
 $result = $dbh ->query("SHOW TABLES");
 while($row = $result -> fetch(PDO::FETCH_BOTH)){
  echo($row[0]);
  echo("<br/>");
 }
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
?>
