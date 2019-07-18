<?php

$fbid = '398843257654116';
$fbsecretkey = 'a48a6c287fe83faa7942f41ea340302e';
$fbscope = 'email,user_link';
function fb_authorization()
{
    global $fbid;
    global $fbsecretkey;
    global $fbscope;
    global $redirect_uri;
    if (!empty($_GET['code'])) {
        $code = $_GET['code'];
        $link = curl("https://graph.facebook.com/v3.3/oauth/access_token?client_id=$fbid&redirect_uri=$redirect_uri&client_secret=$fbsecretkey&code=$code");
        //$_SESSION['user']
//        echo '<pre>';
//            print_r($link);
//            echo '</pre>';
        if ($link) {
            if (isset($link['access_token']) and isset($users['email'])){

                $token = $link['access_token'];
                $users = curl("https://graph.facebook.com/v3.3/me?access_token=$token&fields=id,name,email&client_id=$fbid&redirect_uri=$redirect_uri&client_secret=$fbsecretkey&code=$code");


                //     $_SESSION['data'] = $users;

                $result = do_query("SELECT COUNT(*) as count FROM users WHERE `email` = '{$users['email']}'");
                $result = $result->fetch_object();
                if (empty($result->count)) {
                    $wer = do_query("INSERT INTO `users` (`email`,`name`,  `fb_lid_users`, `token`) VALUES ('{$users['email']}','{$users['name']}', '{$users['id']}', '{$token}')");
                    if ($wer) {
                        ;
                        $_SESSION['data'] = $users;

                    }
                } else {
                    $wer = do_query("UPDATE `users` SET `token` = '" . $token . "' WHERE `email` = '" . $users['email'] . "'");
                    if ($wer) {

                        $res = mysqli_fetch_array(do_query("SELECT * FROM `users` "));
                        if ($res['fb_lid_users'] == null) {
                            $wer2 = do_query("UPDATE `users` SET `fb_lid_users` = '" . $users['id'] . "' WHERE `email` = '" . $users['email'] . "'");
                            if ($wer2) {
                                $_SESSION['data'] = $users;
                            }
                        } else {
                            $_SESSION['data'] = $users;

                        }
                    }
                }
            }
        }
    }
}