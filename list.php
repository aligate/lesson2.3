<?php
$dir = __DIR__.'/json/';
$files = scandir($dir);
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Загрузка файлов</title>
    
  </head>
  <body> 
<h2>Список тестов</h2>
<ul>
	<?php foreach($files as $file) :?>
	<?php if(strpos($file, '.json')) :?>
	<?php $array = json_decode(file_get_contents('json/'.$file), true);?>
	<?php foreach($array as $key=>$value): ?>
<li><a href = "test.php?id=<?= substr($file, 0, -5); ?>"><?= $key." ($file)"; ?></a></li>
	<?php endforeach; ?>
	<?php endif; ?>
	<?php endforeach; ?>
</ul>
 </body>
</html>
