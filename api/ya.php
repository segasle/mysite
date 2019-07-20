<?php
$yaid = '296e90dcdd664daba5145c2bc130c085';
$yasecret = 'f74189f85aff4bd783d75c7310f95ac9';
function ya_authorization(){
    $link = '';
    if (!empty($_GET['access_token'])){
        $token = $_GET['access_token'];
        $link = curl("http://www.example.com/token#access_token=$token&expires_in=600&token_type=bearer");
        echo '<pre>';
        var_dump($link);
        echo '</pre>';
    }
    return $link;
}