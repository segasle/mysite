<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	header('Content-Type: text/html; charset=utf-8');
	include 'db.php';
    include 'function.php';
    $data = $_POST;
    echo ajax_reg($data);