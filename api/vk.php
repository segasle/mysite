<?php
$token = 'access_token=62d6822d330cf42f423a0dbb89ba2e16482d5b21f5fbbd42677b15f11e6b77abc0c96da00e3eaa6b2b7d2';
$id = '6783539';
$scope = 'friends,photos,audio,video,offline,email,wall';
$users = 'photo_max,first_name,last_name,city';
$redirect_uri = 'https://ssd18.ru/';
$appkey = '4wvqw8Rei8P9z8nQ5GhR';
$v = '5.52';
$link = '<a href="https://oauth.vk.com/authorize?client_id=' . $id . '&display=page&redirect_uri=&scope=' . $scope . '&response_type=token&v=' . $v . '">ссылка</a>';
//echo $link;
function get_atbum()
{
    global $token;
    $content = file_link("https://api.vk.com/method/photos.get?owner_id=176938709&album_id=248623253&rev=1&$token&v=5.60");
    //$photos = json_decode($content, true);
    $out = '';
    if (is_array($content) || is_object($content)) {

        foreach ($content['response'] as $photo => $value) {
            if (is_array($value) || is_object($value)) {

                foreach ($value as $item) {
                    $data = date('d.m.Y H:m', $item['date']);
                    //if (count($value)  0) {

                    if ($value = $value[0]) {
                        //if (isset($value)){}

                        $out .= '<div class="carousel-item active">'
                            . '<p>' . $item['text'] . '</p><p class="data">' . $data . '</p><img src="' . $item['photo_604'] . '" alt="" class="d-block w100"></div>';
                    } else {
                        $out .= '<div class="carousel-item">'
                            . '<p>' . $item['text'] . '</p><p class="data">' . $data . '</p><img src="' . $item['photo_604'] . '" alt="" class="w100 d-block"></div>';
                    }
                    //}
                }
            }
        }
    }
    // $out .= '';
    return $out;
}

function user_page()
{
    global $token;
    $content = file_link("https://api.vk.com/method/users.get?user_ids=serg_slepenkov&fields=bdate,about,photo_400_orig&$token&v=5.92");
    $fio = '';
    $img = ' <div class="abot">  <div class="abot_block">';
    $about = '<div class="abot_container"><h4 class="text-center">Коротко обо мне</h4>';
    if (is_array($content) || is_object($content)) {
        foreach ($content['response'] as $item) {
            $fio .= '<p class="h3 text-center">' . $item['first_name'] . ' ' . $item['last_name'] . '</p>';
            $img .= ' <img src="' . $item['photo_400_orig'] . '" class="abot_img">';
            $about .= ' <p class="abot_container_text">' . $item['about'] . '</p>';

        }
    }
    $img .= '</div>';
    $about .= '</div></div>';
    $page = $img . $fio . $about;
    return $page;
}


function vk_authorization()
{
    //session_start();
    global $users;
    global $redirect_uri;
    global $id;
    global $appkey;

    if (isset($_GET['code'])) {
        $code = $_GET['code'];
        // echo $code;
        // print_r($code);
        $content = curl("https://oauth.vk.com/access_token?client_id=$id&client_secret=$appkey&redirect_uri=$redirect_uri&code=$code");
        $_SESSION['user'] = $content;
        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['user']['access_token']) and isset($_SESSION['user']['user_id'])) {
                $user_id = $_SESSION['user']['user_id'];
                $access_token = $_SESSION['user']['access_token'];
                if (isset($user_id) and isset($access_token)) {
                    $use = curl("https://api.vk.com/method/users.get?user_ids=$user_id&fields=$users&access_token=$access_token&v=5.92");
                    if (is_array($use) || is_object($use)) {

                        $_SESSION['data'] = $use['response'];

                        $result = do_query("SELECT COUNT(*) as count FROM users WHERE `email` = '{$_SESSION['user']['email']}'");
                        $result = $result->fetch_object();
                        if (empty($result->count)) {
                            $wer = do_query("INSERT INTO `users` (`email`,`name`, `surname`, `id_users`, `token`) VALUES ('{$_SESSION['user']['email']}','{$_SESSION['data'][0]['first_name']}','{$_SESSION['data'][0]['last_name']}', '{$_SESSION['data'][0]['id']}', '{$access_token}')");
                            if ($wer) {
                                //header("location: ?page=main");
                                //print_r($_SESSION['data']);
                                $data = mysqli_fetch_array(do_query("SELECT * FROM `users` WHERE `email` = '{$_SESSION['user']['email']}'"));
                                //setcookie('user', $data);
                                $_SESSION['data'] = $data;

                            }
                        } else {
                            $wer = do_query("UPDATE `users` SET `token` = '" . $access_token . "' WHERE `email` = '" . $_SESSION['user']['email'] . "'");
                            if ($wer) {
                                $data = mysqli_fetch_array(do_query("SELECT * FROM `users` WHERE `email` = '{$_SESSION['user']['email']}'"));
                                $_SESSION['data'] = $data;
                            }
                        }
                    }
                }

            }

        }

    }

    return;
}

function post()
{
    global $token;
    $file = file_link("https://api.vk.com/method/wall.get?owner_id=-180547513&count=20&filter=owner&$token&v=5.1");
    //$out = '<div class="row">';
    $post = '<div class="col-lg-9 col-xl-10"><div class="container">';
    if (is_array($file) || is_object($file)) {
        foreach ($file as $item) {
            $text = '';
            $img = '';
            foreach ($item['items'] as $value) {
                $data = date('d.m.Y h:m', $value['date']);
                $link = 'https://vk.com/wall' . $value['to_id'] . '_' . $value['id'];
                if (isset($value['text'])) {
                    $text = $value['text'];
                }
                $post .= '<div class="container_block">
                             <div class="container_block-head">
                             <p class="text-right data">' . $data . '</p>
</div>
                            <div class="container_block-content">
                                <div class="content_title">
                                    <div class="content_title-text">
                                        <p>' . $text . '</p>
                                    </div>';
                if (isset($value['attachments'])) {
                    if (is_array($value['attachments']) || is_object($value['attachments'])) {
                        foreach ($value['attachments'] as $attachment => $key) {
                            if (isset($key['photo'])) {
                                $img = "<img src='" . $key['photo']['photo_1280'] . "' class='img w-100'>";
                            } else {
                                $img = '';
                            }
                            $post .= '
                                    <div class="content_title-photo">
                                        ' . $img . '          
                                    </div>';
                        }
                    }
                }
                $post .= '</div>
                            </div>
                            <div class="container_block-footer">
                                <div class="footer_content">
                                    <div class="footer_content-text">
                                        <a href="' . $link . '" target="_blank">Ссылка на пост</a>
                                   </div>
                              </div>
                            </div>
                      </div>';
            }
        }
    }
    $post .= '</div></div>';
    //$post = count($post) / 5;
    return $post;
}
