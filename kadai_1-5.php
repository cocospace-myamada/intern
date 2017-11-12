<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title></title>
</head>
<body>
<h1>フォームデータの送信</h1>
<form action ="kadai_1-5.php" method ="get">
<input type ="text" name ="comment"><br/>
<input type ="submit" value ="送信">
</form>
</body>
</html>
<?php
$comment=$_GET["comment"];
$file = "kadai_1-5.txt";
$name ="$comment\n";
file_put_contents($file,$name);
?>