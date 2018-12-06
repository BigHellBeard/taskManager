<?php

//если файл с именем полученным при помощи GET запроса существует, то скачиваем иначе страница не найдена

if (file_exists($_GET['file_name'])) {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename='. $_GET['file_name'. true]);
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
} // проверка на наличие GET запроса. Если нет, ничего не происходит
else if(is_null($_GET['file_name'])) {
	exit;
}
else{
	header('Location: 404.php');
	exit;
};
?>