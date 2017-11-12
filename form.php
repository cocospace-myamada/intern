<?php
$name =$_REQUEST["namae"];
$pass =$_REQUEST["pass"];
$pass2 =$_REQUEST["pass2"];
$mail =$_REQUEST["mail"];
$mail2 =$_REQUEST["mail2"];
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
?>
<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title>新規登録画面</title>
</head>
<body>
<form action="check.php" method ="post">
<h1>新規登録画面<br/><br/><h1/>
<h2>ユーザー登録をいたします。名前、パスワードを入れてください。<br/><br/><h2/>
<h3>名前（ユーザー名となります）<h3/>
<input type ="text" name ="namae"><br/>
<h3>パスワード<h3/><br/>
<input type ="text" name ="pass"><br/><br/>
<h3>パスワード（確認）<h3/><br/>
<input type ="text" name ="pass2"><br/><br/>
<h3>メールアドレス<h3/><br/>
<input type ="text" name ="mail"><br/><br/>
<h3>メールアドレス（確認）<h3/><br/>
<input type ="text" name ="mail2"><br/><br/>
<input type ="submit" value ="確認"><br/>
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