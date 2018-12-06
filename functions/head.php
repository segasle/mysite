<?php
global $title;
if (basename($_SERVER['REQUEST_URI']) == '?page=main') {
    $title = 'Главная страница о Сергее Слепенкова';
}
if (basename($_SERVER['REQUEST_URI']) == '') {
    $title = 'Главная страница о Сергее Слепенкова';
}

if (basename($_SERVER['REQUEST_URI']) == '?page=experience') {
    $title = 'Навыки';
}if (basename($_SERVER['REQUEST_URI']) == '?page=blog') {
    $title = 'блог';
}if (basename($_SERVER['REQUEST_URI']) == '?page=project') {
    $title = 'Проекты';
}if (basename($_SERVER['REQUEST_URI']) == '?page=contacts') {
    $title = 'Контакты';
}