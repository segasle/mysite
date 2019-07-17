<?php
$fbid = '398843257654116';
$fbsecretkey = 'a48a6c287fe83faa7942f41ea340302e';
$fbscope = 'email,user_link';
function fb_authorization(){
    global $fbid;
    global $fbsecretkey;
    global $fbscope;
    global $redirect_uri;
    if (!empty($_GET['code'])){
        $code = $_GET['code'];
        $link = curl("https://graph.facebook.com/v3.3/oauth/access_token?client_id=$fbid&redirect_uri=$redirect_uri&client_secret=$fbsecretkey&code=$code");
        //$_SESSION['user']
        echo '<pre>';
            print_r($link);
            echo '</pre>';
        if ($link){
            $token = $link['access_token'];
            $users = curl("https://graph.facebook.com/v3.3/me?access_token=$token&fields=id,name,email&client_id=$fbid&redirect_uri=$redirect_uri&client_secret=$fbsecretkey&code=$code");
            echo '<pre>';
            print_r($users);
            echo '</pre>';
        }
    }
}