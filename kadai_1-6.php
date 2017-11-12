<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title></title>
</head>
<body>
<h1>フォームデータの送信</h1>
<form action ="kadai_1-6.php" method ="get">
<input type ="text" name ="comment"><br/>
<input type ="submit" value ="送信">
</form>
</body>
</html>
<?php
if (strlen($_GET["comment"])) {
$comment=$_GET["comment"];
$file = "kadai_1-6.txt";
$name ="$comment\n";
file_put_contents($file,$name,FILE_APPEND);
}
?>