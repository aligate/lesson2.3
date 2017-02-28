<?php
if($_FILES){
$temp_name = $_FILES['test']['tmp_name'];
$name = __DIR__.'/'.$_FILES['test']['name'];
if(move_uploaded_file($temp_name, $name)) header('Location: list.php');
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Загрузка файлов</title>
    
  </head>
  <body>
<h2>Загрузка тестовых файлов</h2>

   <form method = 'POST' enctype='multipart/form-data'>
		<input type ='file' name='test'>
		<button>Отправить</button>
	</form>
	  <p style ="color: blue; font-size:20px;"><a href="list.php">Перейти к списку загруженных файлов</a></p>
  </body>
</html>
