<?php
$file="kadai_2-2.txt";
if(strlen($_POST["edit"])&& !strlen($_POST["editmode"])){
 $edit=$_POST["edit"];
 foreach(file($file) as $line){
  $array=explode("<>",$line);
  if($edit==$array[0]){
   $editdata=$array[2];
   $edita=$edit;
  }
 }
}
if(strlen($_POST["edit"])&& strlen($_POST["comment"])&& strlen($_POST["editmode"])){
 $editdata=$_POST["comment"];
 $edit=$_POST["edit"];
}
?>
<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset ="UFT-8">
<title></title>
</head>
<body>
<h1>入力フォーム</h1>
<form action ="kadai_2-5.php" method ="post">
<?php if($editdata) :?>
<input type ="hidden" name ="editmode" value="<? echo $edita; ?>"/>
<h2/>編集モード<h2/>
<?php endif; ?>
<h3>名前<h3/>
<input type ="text" name ="namae"><br/>
<h4>コメント<h4/>
<input type ="text" name ="comment" value = "<? echo $editdata; ?>"><br/>
<h5>削除対象番号<h5/>
<input type ="text" name ="delete"><br/>
<h6>編集対象番号<h6/>
<input type ="text" name ="edit" value="<? echo $edit; ?>"><br/>
<input type ="submit" value ="送信"><br/>
</form>
</body>
</html>
<?php
$file="kadai_2-2.txt";
if(strlen($_POST["delete"])){
 $delete=$_POST["delete"];
 foreach(file($file) as $line){
  $array=explode("<>",$line);
  if($delete!=$array[0]){
   $save="$save" . "$line";
  }
 }
 file_put_contents($file,$save);
}
if(strlen($_POST["editmode"])&& strlen($_POST["comment"])&& strlen($_POST["edit"])){
 $edit=$_POST["edit"];
 $comment=$_POST["comment"];
 $editmode=$_POST["editmode"];
 foreach(file($file) as $line){
  $array=explode("<>",$line);
  if($edit==$editmode && $edit==$array[0]){
   $array[2]=$comment;
   $array[3]=date("Y,n月j日G時i分s秒");
   $c="{$array[0]}<>{$array[1]}<>{$array[2]}<>{$array[3]}";
   $editsave="$editsave" . "$c".PHP_EOL;
  }else{
   $editsave="$editsave" . "$line";
  }
 }
 file_put_contents($file,$editsave);
}
if(strlen($_POST["namae"])&& strlen($_POST["comment"])){
 $namae=$_POST["namae"];
 $comment=$_POST["comment"];
 foreach(file($file) as $line){
  $array=explode("<>",$line);
 }
 $count=$array[0]+1;
 $time=date("Y,n月j日G時i分s秒");
 $a="{$count}<>{$namae}<>{$comment}<>{$time}";
 file_put_contents($file,$a.PHP_EOL,FILE_APPEND);
}
foreach(file($file) as $line){
 $array=explode("<>",$line);
 foreach($array as $b){
  echo($b."<br/>");
 }
 echo("<br/>");
}
?>
