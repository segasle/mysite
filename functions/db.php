<?php
global $mysqli;
if (empty($mysqli)){
    $mysqli = mysqli_connect('localhost', 'ca57629_mysite', 'Nexvf1998', 'ca57629_mysite');
    mysqli_set_charset($mysqli, 'UTF8');
}
if (mysqli_connect_errno()){
    echo 'ошибка в подключении к БД ('.mysqli_connect_errno().')'.mysqli_connect_error();
}
session_start();