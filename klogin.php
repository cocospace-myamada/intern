<?php
$kid =$_REQUEST["kid"];
$pass =$_REQUEST["pass"];
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
if(isset($_REQUEST["klogin"])){
 if(empty($kid)){
  echo("仮IDが未入力です。");
 }else if(empty($pass)){
  echo("パスワードが未入力です。");
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
  echo("ID、もしくはパスワードが間違っています。");
 }
}
?>
<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title>仮ログイン画面</title>
<style></style>
</head>
<body>
<h1>仮ログイン画面<h1/>
<form action ="klogin.php"  method="post">
<div style="text-align : left">
<h6>仮ID<h6/>
<input type ="text" name ="kid"><br/>
<h6>パスワード<h6/><br/>
<input type ="text" name ="pass"><br/><br/>
<input type ="submit" name="klogin" value ="仮ログイン">
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