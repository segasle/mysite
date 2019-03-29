<?php
global $title;
$page = basename($_SERVER['REQUEST_URI']);
$res = do_query("SELECT * FROM `meta_title` JOIN `menu` ON meta_title.url_meta = menu.url WHERE meta_title.url_meta = '{$page}'");
foreach ($res as $item) {
    if ($page == $item['url_meta']) {
        $title = $item['title_meta'] .' | Сергей Слепенков - ssd18.ru';
    }
}
