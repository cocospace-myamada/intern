<?php
$file="kadai_2-6.txt";
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
<form action ="kadai_2-6.php" method ="post">
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
<input type ="text" name ="edit" value="<? echo $edit; ?>"><br/><br/>
<h7>パスワード<h7/><br/>
<input type ="text" name ="pass"><br/><br/>
<input type ="submit" value ="送信"><br/>
</form>
</body>
</html>
<?php
$file="kadai_2-6.txt";
if(strlen($_POST["delete"])&& strlen($_POST["pass"])){
 $delete=$_POST["delete"];
 $pass=$_POST["pass"];
 foreach(file($file) as $line){
  $array=explode("<>",$line);
  if($delete==$array[0] && $pass+PHP_EOL==$array[4]){
   foreach(file($file) as $line){
    $array=explode("<>",$line);
    if($delete!=$array[0]){
     $save="$save" . "$line";
    }
   }
  file_put_contents($file,$save);
  }
 }
}
if(strlen($_POST["editmode"])&& strlen($_POST["comment"])&& strlen($_POST["edit"])&& strlen($_POST["pass"])){
 $edit=$_POST["edit"];
 $comment=$_POST["comment"];
 $editmode=$_POST["editmode"];
 $pass=$_POST["pass"];
 foreach(file($file) as $line){
  $array=explode("<>",$line);
  if($edit==$editmode && $edit==$array[0] && $pass+PHP_EOL==$array[4]){
   foreach(file($file) as $line){
    $array=explode("<>",$line);
    if($edit==$editmode && $edit==$array[0]){
     $array[2]=$comment;
     $array[3]=date("Y,n月j日G時i分s秒");
     $c="{$array[0]}<>{$array[1]}<>{$array[2]}<>{$array[3]}<>{$array[4]}";
     $editsave="$editsave" . "$c";
    }else{
     $editsave="$editsave" . "$line";
    }
   }
   file_put_contents($file,$editsave);
  }
 }
}
if(strlen($_POST["namae"])&& strlen($_POST["comment"])&& strlen($_POST["pass"])&& !strlen($_POST["edit"])&& !strlen($_POST["delete"])){
 $namae=$_POST["namae"];
 $comment=$_POST["comment"];
 foreach(file($file) as $line){
  $array=explode("<>",$line);
 }
 $count=$array[0]+1;
 $time=date("Y,n月j日G時i分s秒");
 $pass=$_POST["pass"];
 $a="{$count}<>{$namae}<>{$comment}<>{$time}<>{$pass}";
 file_put_contents($file,$a.PHP_EOL,FILE_APPEND);
}
foreach(file($file) as $line){
 $array=explode("<>",$line);
 echo($array[0]."<br/>".$array[1]."<br/>".$array[2]."<br/>".$array[3]."<br/>"."<br/>");
}
?>
