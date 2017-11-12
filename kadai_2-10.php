<?php 
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
 $columns = $dbh ->query("SHOW COLUMNS FROM kadai15");
 while($row = $columns -> fetch(PDO::FETCH_BOTH)){
  echo($row['Field']);
  echo("<br/>");
 }
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
?>
