<?php
// Авторизация пользователя
require('validate.class.php');
/**
* 
*/
// Читаем данные, переданные в POST
$rawPost = file_get_contents('php://input');

// Если данные были переданы...
if ($rawPost){
	// Разбор пакета JSON
	$userInfo = json_decode($rawPost);
	
	// Объект валидации
	$user = new Validate();
	$valid = $user->validate($userInfo);
}else{
	$valid = false;
}
// Заголовки ответа
header('Content-type: text/plain; charset=utf-8');
header('Cache-Control: no-store, no-cache');
header('Expires: ' . date('r'));
// Возвращаем результат проверки
echo json_encode($valid);