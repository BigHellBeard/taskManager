<?php
$lifetime = 1200;
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
session_name('session_id');
ini_set('session.gc_maxlifetime', $lifetime);
ini_set('session.cookie_lifetime', $lifetime);
ini_set('session.gc_divisor', 100);
ini_set('session.gc_probability', 100);

if (session_id() == ''){
	session_start();
}
if (!$_SESSION['authCheck'] && !empty($uri)) {
	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
	exit();
}
if ($_POST['logout']) {
	setcookie(session_name(), session_id(), time() - 300);
	session_destroy();
	unset($_SESSION['authCheck']);
	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
	exit();
}
if ($_SESSION['authCheck']) {
	setcookie(session_name(), session_id(), time() + $lifetime);
	setcookie('user_cookie', $_COOKIE['user_cookie'], time() + (60 * 60 * 24 * 30));
}