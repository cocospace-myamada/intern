<?php
$pic=$_REQUEST["pic"];
$video=$_REQUEST["video"];
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
<!DOCTYPE html>
<html lang ="ja">
<head>
<meta http-equiv="Content-Type" content="text/html"; charset ="UFT-8">
<title>�摜�A����t�@�C�����e�e�X�g</title>
<style></style>
</head>
<body>
<form action="picvideotest.php" method="post" enctype="multipart/form-data">
<h3>�摜�E����A�b�v�f�[�g�p�iJPEG,PNG,GIF,mp4�̂݁j<h3/>
<input type= "file" name="pic"><br/>
<input type ="submit" value ="���M"><br/><br/>
</form>
<?php
try{
 $stmt = $dbh ->query('CREATE TABLE IF NOT EXISTS pictest(
 id INT(16) NOT NULL,
 pic MEDIUMBLOB NOT NULL,
 ext varchar(5) NOT NULL,
 PRIMARY KEY(id)
 )'
 );
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
if(strlen($_FILES["pic"])){
try{
 $fp=fopen($_FILES["pic"]["tmp_name"],"rb");
 $imgdat = file_get_contents($_FILES["pic"]["tmp_name"]);
 $img = addslashes($imgdat);
 $ext = pathinfo($_FILES["pic"]["name"], PATHINFO_EXTENSION);
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
try{
 $select = $dbh ->query("SELECT id FROM pictest ORDER BY id");
  while($row = $select -> fetch(PDO::FETCH_BOTH)){
   $id =$row['id']+1;
  }
 $insert = $dbh ->query("INSERT INTO pictest ( id,pic,ext ) VALUES ('$id','$img','$ext')");
 echo ("�ǂݍ��݊���");
}catch (PDOException $PDOe) {
    echo ($PDOe->getMessage());
}
}
?>
</body>
</html>