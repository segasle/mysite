<?php
global $title;
$page = basename($_SERVER['REQUEST_URI']);
$res = do_query("SELECT * FROM `meta_title` JOIN `menu` ON meta_title.url = menu.url WHERE meta_title.url = '{$page}'");
foreach ($res as $item) {
    if (basename($_SERVER['REQUEST_URI']) == $item['url']) {
        $title = $item['title'];
    }
}
if (basename($_SERVER['REQUEST_URI']) == '?page=main') {
    $title = 'Главная страница о Сергее Слепенкова';
}
if (basename($_SERVER['REQUEST_URI']) == '') {
    $title = 'Главная страница о Сергее Слепенкова';
}

if (basename($_SERVER['REQUEST_URI']) == '?page=experience') {
    $title = 'Навыки';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=blog') {
    $title = 'блог';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=project') {
    $title = 'Проекты';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=contacts') {
    $title = 'Контакты';
}
if (basename($_SERVER['REQUEST_URI']) == '?page=design') {
    $title = 'Работы по графическому дизайну';
}