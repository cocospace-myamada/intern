<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title></title>
</head>
<body>
<h1>�t�H�[���f�[�^�̑��M</h1>
<form action ="kadai_1-4.php" method ="get">
<input type ="text" name ="comment"><br/>
<input type ="submit" value ="���M">
</form>
</body>
</html>
<?php
$comment = $_GET["comment"];
echo $comment;
?>