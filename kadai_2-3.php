<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title></title>
</head>
<body>
<h1>���̓t�H�[��</h1>
<form action ="kadai_2-3.php" method ="post">
<h2>���O<h2/>
<input type ="text" name ="namae"><br/>
<h3>�R�����g<h3/>
<input type ="text" name ="comment"><br/>
<input type ="submit" value ="���M"><br/>
</form>
</body>
</html>
<?php
$file="kadai_2-2.txt";
foreach(file($file) as $line){
$array=explode("<>",$line);
foreach($array as $b){
echo($b."<br/>");
}
echo("<br/>");
}
if(strlen($_POST["namae"])&& strlen($_POST["comment"])){
$namae=$_POST["namae"];
$comment=$_POST["comment"];
$count=sizeof(file($file))+1;
$time=date("Y,n��j��G��i��s�b");
$a="{$count}<>{$namae}<>{$comment}<>{$time}";
file_put_contents($file,$a.PHP_EOL,FILE_APPEND);
}
?>