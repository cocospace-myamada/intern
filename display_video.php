<?php
$pic=$_POST["pic"];
$video=$_POST["video"];
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
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset ="UFT-8">
<title>画像、動画ファイル投稿テスト</title>
<style></style>
</head>
<body>
<form action="display_img.php" method="get" enctype="multipart/form-data">
</form>
<video src= videotes.mp4></video>
</body>
</html>
