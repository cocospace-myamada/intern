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
 $stmt = $dbh ->query('CREATE TABLE IF NOT EXISTS kadaib(
 name VARCHAR(255),
 comment VARCHAR(255),
 pass VARCHAR(255)
 )'
);
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
try{
 $insert = $dbh ->query("INSERT INTO kadaib (name, comment, pass) VALUES ('yamada', 'test', 'yamada')");
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
?>
