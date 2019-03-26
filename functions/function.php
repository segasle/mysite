<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
header('Content-Type: text/html; charset=utf-8');

define('WP_DEBUG', true);
define('WP_CACHE', false);
function connections()
{
    $file = '';
    if (empty($_GET['page'])) {
        $file = 'main';
    } else {
        $file = $_GET['page'];
    }
    include 'tempate/header.php';
    include 'inip/' . $file . '.php';
    include 'tempate/footer.php';

}

function do_query($query)
{
    global $mysqli;

    $result = mysqli_query($mysqli, $query);
    return $result;
}

function get_menu()
{
    $sql = do_query('SELECT * FROM `menu`');
    $output = "<ul>";
    foreach ($sql as $r) {
        $output .= "<li><a href='" . $r['url'] . "'>" . $r['title'] . "</a></li>";
    }
    return $output;
}

function post_project()
{
    $sql = do_query('SELECT * FROM `projects` WHERE 1');
    $out = '';

    while ($rs = mysqli_fetch_array($sql)) {
        $mydata = new DateTime($rs['data']);
        $out .= '<div class="maps"><div class="maps_container"><div class="maps_head"><img src="' . $rs['img'] . '"></div><div class="maps_title"><a target="_blank" href="' . $rs['link'] . '">' . $rs['title'] . '</a></div><div class="maps_data"><p>' . $mydata->format('d.m.Y') . '</p></div></div></div>';
    }
    return $out;
}

function get_contact()
{
    $sql = do_query('SELECT * FROM `meta_contact` WHERE 1');
    $out = '<div class="info">';
    while ($rs = mysqli_fetch_array($sql)) {
        $mydata = new DateTime($rs['birthday']);
        $out .= '
                  <div class="info_fio">
                    <p><span>фио: </span>' . $rs['fio'] . '</p>
                 </div>
                    <div class="info_birthday">
                        <p><span>др: </span>' . $mydata->format('d.m.Y') . '</p>
                    </div>                 
                     <div class="info_email">
                    <p><span>почта: </span><a href="mailto:' . $rs['email'] . ' ">' . $rs['email'] . '</a></p>
                 </div>
              </div>';
    }
    return $out;
}
