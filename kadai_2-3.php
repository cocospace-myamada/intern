<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title></title>
</head>
<body>
<h1>入力フォーム</h1>
<form action ="kadai_2-3.php" method ="post">
<h2>名前<h2/>
<input type ="text" name ="namae"><br/>
<h3>コメント<h3/>
<input type ="text" name ="comment"><br/>
<input type ="submit" value ="送信"><br/>
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
$time=date("Y,n月j日G時i分s秒");
$a="{$count}<>{$namae}<>{$comment}<>{$time}";
file_put_contents($file,$a.PHP_EOL,FILE_APPEND);
}
?>