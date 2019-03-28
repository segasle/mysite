<?php
$token = 'access_token=62d6822d330cf42f423a0dbb89ba2e16482d5b21f5fbbd42677b15f11e6b77abc0c96da00e3eaa6b2b7d2';
$id = '6783539';
$scope = 'friends,photos,audio,video,offline,email,wall';
$users = 'photo_max,first_name,last_name,city';
$redirect_uri = 'https://ssd18.ru';
$appkey = '4wvqw8Rei8P9z8nQ5GhR';
$v = '5.52';
$link = '<a href="https://oauth.vk.com/authorize?client_id=' . $id . '&display=page&redirect_uri=&scope=' . $scope . '&response_type=token&v=' . $v . '">ссылка</a>';
//echo $link;
function get_atbum()
{
    global $token;
    $content = file_get_contents("https://api.vk.com/method/photos.get?owner_id=176938709&album_id=248623253&rev=1&$token&v=5.60");
    $photos = json_decode($content, true);
    $out = '<div class="atbum row">';
    foreach ($photos['response'] as $photo) {
        if (!empty(is_array($photo) || is_object($photo))) {
            foreach ($photo as $item) {
                $data = date('d.m.Y H:m', $item['date']);
                $out .= '<div class="atbum_photo col-xs-12 col-sm-6 col-md-4 col-lg-2">'
                    . '<p>' . $item['text'] . '</p><img src="' . $item['photo_604'] . '" alt=""><p>' . $data . '</p></div>';
            }
        }
    }
    $out .= '</div>';
    return $out;
}

function user_page()
{
    global $token;
    $content = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids=serg_slepenkov&fields=bdate,about,photo_400_orig&$token&v=5.92"), true);
    $fio = '';
    $img = ' <div class="abot">  <div class="abot_block">';
    $about = '<div class="abot_container"><h2>Коротко обо мне</h2>';
    foreach ($content['response'] as $item) {
        $fio .= '<h1 class="text-center">' . $item['first_name'] . ' ' . $item['last_name'] . '</h1>';
        $img .= ' <img src="' . $item['photo_400_orig'] . '" class="abot_img">';
        $about .= ' <p class="abot_container_text">' . $item['about'] . '</p>';

    }

    $img .= '</div>';
    $about .= '</div></div>';
    $page = $fio . $img . $about;
    return $page;
}

function link_authorization()
{
    global $scope;
    global $redirect_uri;
    global $id;
    if (empty($_COOKIE['token'])) {
        $out = ' <a href="https://oauth.vk.com/authorize?client_id=' . $id . '&display=page&redirect_uri=' . $redirect_uri . '&scope=' . $scope . '&response_type=code&v=5.92" class="fa fa-vk fa-2x" aria-hidden="true"></a>';
    }
    return $out;
}

function vk_authorization()
{
    global $users;
    global $redirect_uri;
    global $id;
    global $appkey;
    if (!empty($_GET['code'])) {
        $code = $_GET['code'];
        $content = json_encode(file_get_contents("https://oauth.vk.com/access_token?client_id=$id&client_secret=$appkey&redirect_uri=$redirect_uri&code=$code"));
        setcookie('user', $content);
        if (isset($_COOKIE['user'])) {
            $user = json_decode($_COOKIE['user'], true);
            //$data = json_encode($user, false);
            echo '<pre>';
            print_r($user);
            echo '</pre>';
            //     $use = file_get_contents("https://api.vk.com/method/users.get?user_ids=$user->user_id&fields=$users&access_token=$user->access_token&v=5.92");
            //  $data = json_decode($use, true);
            //   print_r($data);
//                foreach ($user['response'] as $item) {
//                    $_SESSION['name'] = $item['first_name'];
//                    $_SESSION['surname'] = $item['last_name'];
//                    $_SESSION['photo'] = $item['photo_max'];
//                }
//                $result = do_query("SELECT COUNT(*) as count FROM users WHERE `email` = '{$_SESSION['email']}'");
//                $result = $result->fetch_object();
//                if (empty($result->count)) {
//                    $wer = do_query("INSERT INTO `users` (`email`,`name`, `surname`,  `photo`, `users-id`, `token`) VALUES ('{$_SESSION['email']}','{$_SESSION['name']}','{$_SESSION['surname']}', '{$_SESSION['photo']}', '{$_SESSION['user_id']}', '{$_SESSION['token']}')");
//                } else {
//                    $users = do_query("UPDATE `users` SET `token` = '" . $_SESSION['token'] . "' WHERE `email` = '" . $_SESSION['email'] . "'");
//                }
//                //         print_r($token2);
//            }
        }

    }
    return;
}
