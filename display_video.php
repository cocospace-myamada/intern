<?php
$pic=$_POST["pic"];
$video=$_POST["video"];
$dsn = '�f�[�^�x�[�X��';
$user='���[�U�[��';
$password='�p�X���[�h';
$dbname = '�f�[�^�x�[�X��';
try{
 $dbh = new PDO($dsn, $user, $password);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
 echo '�f�[�^�x�[�X�ɃA�N�Z�X�ł��܂���' . $e->getMessage();
 exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset ="UFT-8">
<title>�摜�A����t�@�C�����e�e�X�g</title>
<style></style>
</head>
<body>
<form action="display_img.php" method="get" enctype="multipart/form-data">
</form>
<video src= videotes.mp4></video>
</body>
</html>
