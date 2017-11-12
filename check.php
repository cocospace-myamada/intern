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
<title>確認画面</title>
</head>
<body>
<?php if ($pass==$pass2 && $mail==$mail2 && strlen($mail) && strlen($mail2) && strlen($pass) && strlen($pass2) && strlen($name)): ?>
<h1>確認画面<br/><br/><h1/>
<h2>ユーザー登録内容を確認します。内容があっていれば登録、変更があれば戻るを押してください。<br/><br/><h2/>
<h3>名前（ユーザー名となります）：<h3/>
<? echo($name); ?><br/>
<h3>パスワード：<h3/>
<? echo($pass); ?><br/>
<h3>パスワード：<h3/>
<? echo($mail); ?><br/>
<form action="savedata.php" method ="post">
<input type ="submit" value ="登録">
<? $in =1; ?>
<input type ="hidden" name ="namae" value="<? echo ($name); ?>" />
<input type ="hidden" name ="pass" value="<? echo ($pass); ?>" />
<input type ="hidden" name ="mail" value="<? echo ($mail); ?>" />
<input type ="hidden" name ="id" value="<? echo ($id); ?>" />
<input type ="hidden" name ="kid" value="<? echo ($kid); ?>" />
</form>
<?php else: ?>
<h4>エラー！：名前、パスワードをきちんと入力してください<h4/>
<?php if (empty($name)): ?>
<h5>名前が無記入です。<h5/>
<?php endif; ?>
<?php if (empty($pass) or empty($pass2)): ?>
<h5>パスワードが無記入です。<br/>しっかり同じパスワードを入れてください。<h5/>
<?php endif; ?>
<?php if ($pass!=$pass2): ?>
<h5>確認用パスワードが間違っています。もう一度記入してください。<h5/>
<?php endif; ?>
<?php if (empty($mail) or empty($mail2)): ?>
<h5>メールアドレスが無記入です。<br/>しっかり同じメールアドレスを入れてください。<h5/>
<?php endif; ?>
<?php if ($mail!=$mail2): ?>
<h5>確認用メールアドレスが間違っています。もう一度記入してください。<h5/>
<?php endif; ?>
<form action="form.php">
<input type ="submit" value ="戻る">
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