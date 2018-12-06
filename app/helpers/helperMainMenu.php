<?php

/**
* Пользовательская функция сортировки массива 
* @param $array массив меню , $sortkey  ключ сортировки
* @param $sortkey  ключ сортировки, по умолчанию 'sort'
* @param $sort метод сортировки принимает два значения 'asc' - в порядке увеличения 
* 'desc' - в порядке уменьшения
* @return $array отсортированный массив
**/
function mainMenuSort($array, $key = 'sort', $sort) {
    usort($array, function($a, $b) use ($key, $sort) {
       return $sort == 'desc' ? $b[$key] <=> $a[$key] : $a[$key] <=> $b[$key];
    });
    return $array;
}


/**
* функция определяет , активен ли пункт меню и присваивает тегу <a> класс "active-link" если активен,
* "link" если не активен  
* @param $name название ссылки 
* @param $ref GET запрос
* @return $name имя класса 
**/
function activeLinkClass($active) {
    return $active ? "active-link" : "menu-link";             
}

/**
* Функция обрезает название длинее 15 символов и подставляет в конце '...' вместо 3-х последних символов
* @param $linkTitle строка с названием раздела
* @return $linkTitle обрезаная строка 
**/
function mainMenuTitleCut(string $linkTitle) : string {
    return mb_strlen($linkTitle) >= 15 ? mb_strimwidth($linkTitle, 0, 15, '...') : $linkTitle;   
}

/** 
* функция подключает шаблон вывода пунктов меню
* @param $array массив пунктов меню
* @param $class класс div'а в котором расположены пункты меню
* @param $sort метод сортировки
**/
function showMenu($array, $class = 'header-main-menu', $sort = 'asc') {
    require($_SERVER['DOCUMENT_ROOT'] . '/app/templates/template_main_menu.php');
}
/**
* Функция определяет акивный раздел меню
* @param $path путь раздела для сравнения
* @param $activeLink путь текущего активного раздела
* @return истина если активный , ложь если нет
**/
function isActive($path, $activeLink) {
    return $path == $activeLink;             
}

/** 
* Поиск в многомерном массиве 
* @param $array массив в котором будет производится поиск
* @param $key ключ по которому будет производится поиск 
* @param $return ключ возвращаемого значения 
* @return значение найденного элемента массива
**/ 
function mainMenuActiveTitle($array, $key, $returnKey, $value) {
    return $array[array_search($value, array_column($array, $key))][$returnKey];
}