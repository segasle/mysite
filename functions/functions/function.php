<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
header('Content-Type: text/html; charset=utf-8');

function connections(){
    $file = '';
    if (empty($_GET['page'])){
        $file = 'main';
    }else{
        $file = $_GET['page'];
    }
    include 'tempate/header.php';
    include  $file . '.php';
    include 'tempate/footer.php';

}
function do_query($query)
{
    global $mysqli;

    $result = mysqli_query($mysqli, $query);
    return $result;
}
function get_menu(){
    $sql = do_query('SELECT * FROM `menu` WHERE `patent` = "0" ORDER BY menu.id');
    $output = "<ul>";
    while ($rs = mysqli_fetch_array($sql)){
        $output .= "<li><a href='".$rs['url']."'>".$rs['title']."</a></li>";
    }
    $output .= "<ul>";
    return $output;
}