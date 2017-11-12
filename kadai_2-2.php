<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title></title>
</head>
<body>
<h1>入力フォーム</h1>
<form action ="kadai_2-2.php" method ="post">
<h2>名前<h2/>
<input type ="text" name ="namae"><br/>
<h3>コメント<h3/>
<input type ="text" name ="comment"><br/>
<input type ="submit" value ="送信">
</form>
</body>
</html>
<?php
if(strlen($_POST["namae"])&& strlen($_POST["comment"])){
$file="kadai_2-2.txt";
$namae=$_POST["namae"];
$comment=$_POST["comment"];
$count=sizeof(file($file))+1;
$time=date("Y,n月j日G時i分s秒");
$a="{$count}<>{$namae}<>{$comment}<>{$time}";
file_put_contents($file,$a.PHP_EOL,FILE_APPEND);
}
?>