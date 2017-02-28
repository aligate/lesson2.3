<?php
require_once 'components/functions.php';
if(!$_GET){
	header('Location: list.php');
} else{ 
$id = $_GET['id'];
if(file_exists("json/$id.json")){
$array = json_decode(file_get_contents("json/$id.json"), true);
} else {
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
	require_once('components/404.html');
	exit();
	}
}
$message = [];
$name = ''; 
if(isset($_POST['submit'])){
	if($_POST['name']){
	$name = $_POST['name'];
	if($_POST['response']){
	$check = $_POST['response'];
	foreach($array as $arr => $item){
	if($item[$check]===false){
	 $message[]= "<p style='color: red; font-size:20px;'><b>$name</b>, ответ неверный, попробуйте еще раз</p>";
	} 
	else{
	$message['prize'] = "Поздравляю, $name!\n Вы победитель!";
	renderPicture($message['prize']);
	$name = '';
		}
    }
} 
	else {
	$message[] = "<p style='color: red; font-size:20px;'><b>$name</b>, Выберите один из вариантов ответа!</p>";
	}
}
	else {
	$message[] = '<p style="color: red; font-size:20px;">Введите ваше имя!</p>';
	}
} 

?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body>

<form method = "post">
	<?php foreach($array as $arr=>$item): ?>
	<h2><?= $arr; ?></h2>
	<p>Введите ваше имя:</p><input type= "text" name = "name" value ="<?= $name; ?>">
	<h3>Выберите правильный вариант ответа</h3>
	<?php foreach($item as $key => $value): ?>
  <input type="radio" name="response" value="<?= $key; ?>"><?= $key; ?><br>
  <?php endforeach; ?>
  <?php endforeach; ?>
  
  <input type= "submit" name="submit" value="Отправить">
</form> 
	<?php if(isset($message['prize'])):?>
	<img src= "components/prize.php" />
	<?php else: ?>
	<?= array_shift($message); ?>
	<?php endif; ?>
	<p style ="color: blue; font-size:20px;"><a href="list.php">Перейти к списку тестов</a></p>
</body>
</html>
