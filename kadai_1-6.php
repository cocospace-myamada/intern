<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title></title>
</head>
<body>
<h1>�t�H�[���f�[�^�̑��M</h1>
<form action ="kadai_1-6.php" method ="get">
<input type ="text" name ="comment"><br/>
<input type ="submit" value ="���M">
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