<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title></title>
</head>
<body>
<h1>���̓t�H�[��</h1>
<form action ="kadai_2-2.php" method ="post">
<h2>���O<h2/>
<input type ="text" name ="namae"><br/>
<h3>�R�����g<h3/>
<input type ="text" name ="comment"><br/>
<input type ="submit" value ="���M">
</form>
</body>
</html>
<?php
if(strlen($_POST["namae"])&& strlen($_POST["comment"])){
$file="kadai_2-2.txt";
$namae=$_POST["namae"];
$comment=$_POST["comment"];
$count=sizeof(file($file))+1;
$time=date("Y,n��j��G��i��s�b");
$a="{$count}<>{$namae}<>{$comment}<>{$time}";
file_put_contents($file,$a.PHP_EOL,FILE_APPEND);
}
?>