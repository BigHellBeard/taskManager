<?php
$_SESSION['authCheck'];
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/logins.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/passwords.php');
$GLOBALS ['authCheck'];
//проверка , заполнены ли поля "логин" и "пароль"
if (!empty($_POST['login']) && !empty($_POST['password'])) {
	// Производим поиск пароля в базе данных, при помощи функции arra_search 
	//котороая возвращает нам индекс элемента массива и присваиваем результат 
	//переменной indexLogin
    $indexLogin = array_search($_POST['login'], $dbLogin, false);
    //Если переменная indexLogin не равна false и отправленный пароль равен паролю 
    //по найденному по indexlogin, то присваем authCheck значение true, 
    //иначе присваиваем false и сохраняем неверно ввёдённые значения 
    //в переменных inputLogin inputPassword 
    if ($indexLogin !== false && $dbPassword[$indexLogin] == $_POST['password']) {
	    $authCheck = true;
    } else {
    	$authCheck = false;
        $inputLogin = $_POST['login'];
        $inputPassword = $_POST['password'];
    }
}