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
 $insert = $dbh ->query("INSERT INTO kadaib (name, comment, pass) VALUES ('ymd', 'tes2', 'yamada')");
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
try{
 $update = $dbh ->query("UPDATE kadaib SET comment ='test3' WHERE pass ='y'"); 
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
try{
 $delete = $dbh ->query("DELETE FROM kadaib WHERE pass ='y'");
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
try{
 $select = $dbh ->query('SELECT name, comment, pass FROM kadaib');
 while($row = $select -> fetch(PDO::FETCH_BOTH)){
  echo("name:".$row['name']."<br/>");
  echo("comment:".$row['comment']."<br/>");
  echo("pass:".$row['pass']."<br/>");
  echo("<br/>");
 }
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
?>
