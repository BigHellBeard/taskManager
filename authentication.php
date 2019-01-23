<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/logins.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/passwords.php');

if (isset($_COOKIE['user_cookie'])){
    $login = $_COOKIE['user_cookie'];
    $loginInputField = 'hidden';
} else {
    $login = md5($_POST['login']);
}
//проверка , заполнены ли поля "логин" и "пароль"
if (!empty($login) && !empty($_POST['password'])) {
	// Производим поиск пароля в базе данных, при помощи функции arra_search 
	//котороая возвращает нам индекс элемента массива и присваиваем результат 
	//переменной indexLogin
    foreach ($dbLogin as $key => $value) {
        if(md5($value) !== $login) {
            $loginIndex = false;
            continue;
        }
        $loginIndex = $key;
        break;
    }
    //Если переменная indexLogin не равна false и отправленный пароль равен паролю 
    //по найденному по indexlogin, то присваем authCheck значение true, 
    //иначе присваиваем false и сохраняем неверно введённые значения 
    //в переменных inputLogin inputPassword 
    if ($loginIndex !== false && $dbPassword[$loginIndex] === $_POST['password']) {
	    $_SESSION['authCheck'] = true;
        setcookie('user_cookie', $login, time() + (60 * 60 * 24 * 30));
    } else {
    	$_SESSION['authCheck'] = false;
        $inputLogin = $_POST['login'];
        $inputPassword = $_POST['password'];
    }
}
