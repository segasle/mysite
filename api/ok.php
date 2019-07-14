<?php
$oktoken = 'tkn1cFAsEys07QIXAnPFkyZjG0aRb9b0wzPCwozZuT3SHe4pi1Gf1KC4ZQZCTz0t4IMA7';
$okkey = '38c7df7bde2f2a3594525bb240eed37d';
$okscope = 'VALUABLE_ACCESS,LONG_ACCESS_TOKEN,PHOTO_CONTENT,GET_EMAIL';
$okid = '1277595392';
$secretkey = '47B3C84B19EE3DBD5BF383B7';
function ok_authorization(){
    global $redirect_uri;
    global $okscope;
    global $secretkey;
    global $okid;
    if (!empty($_GET['code'])){
        $code = $_GET['code'];
        $file = json_decode(file_get_contents("https://api.ok.ru/oauth/token.do?code=".$code."&client_id=".$okid."&client_secret=".$secretkey."&redirect_uri=".$redirect_uri."&grant_type=authorization_code"));
        $_SESSION['user'] = $file;
        if (isset($_SESSION['user'])){
            $access_token = $_SESSION['user']['access_token'];
            $users = json_decode(file_get_contents("https://api.ok.ru/oauth/token.do?refresh_token=".$access_token."&client_id=".$okid."&client_secret=".$secretkey."&grant_type=refresh_token"));

            echo '<pre>';
            print_r($users);
            echo '</pre>';
        }



    }
}