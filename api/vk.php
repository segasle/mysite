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
    $content = file_link("https://api.vk.com/method/photos.get?owner_id=176938709&album_id=248623253&rev=1&$token&v=5.60");
    //$photos = json_decode($content, true);
    $out = '<div class="atbum row">';
    if (is_array($content) || is_object($content)) {
        foreach ($content['response'] as $photo) {
            if (!empty(is_array($photo) || is_object($photo))) {
                foreach ($photo as $item) {
                    $data = date('d.m.Y H:m', $item['date']);
                    $out .= '<div class="atbum_photo col-xs-12 col-sm-6 col-md-4 col-lg-2">'
                        . '<p>' . $item['text'] . '</p><img src="' . $item['photo_604'] . '" alt=""><p>' . $data . '</p></div>';
                }
            }
        }
    }
    $out .= '</div>';
    return $out;
}

function user_page()
{
    global $token;
    $content = file_link("https://api.vk.com/method/users.get?user_ids=serg_slepenkov&fields=bdate,about,photo_400_orig&$token&v=5.92");
    $fio = '';
    $img = ' <div class="abot">  <div class="abot_block">';
    $about = '<div class="abot_container"><h2>Коротко обо мне</h2>';
    if (is_array($content) || is_object($content)) {
        foreach ($content['response'] as $item) {
            $fio .= '<h1 class="text-center">' . $item['first_name'] . ' ' . $item['last_name'] . '</h1>';
            $img .= ' <img src="' . $item['photo_400_orig'] . '" class="abot_img">';
            $about .= ' <p class="abot_container_text">' . $item['about'] . '</p>';

        }
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
    if (empty($_SESSION['token'])) {
        $out = ' <a href="https://oauth.vk.com/authorize?client_id=' . $id . '&display=page&redirect_uri=' . $redirect_uri . '&scope=' . $scope . '&response_type=code&v=5.92" class="fa fa-vk fa-2x" aria-hidden="true"></a>';
    }
    return $out;
}

function vk_authorization()
{
    //session_start();
    global $users;
    global $redirect_uri;
    global $id;
    global $appkey;
    if (!empty($_GET['code'])) {
        $code = $_GET['code'];
        $content = file_link("https://oauth.vk.com/access_token?client_id=$id&client_secret=$appkey&redirect_uri=$redirect_uri&code=$code");
        $_SESSION['user'] = $content;
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['user_id'];
            $access_token = $_SESSION['user']['access_token'];
            $use = file_link("https://api.vk.com/method/users.get?user_ids=$user_id&fields=$users&access_token=$access_token&v=5.92");
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

    return;
}

function post()
{
    global $token;
    $file = file_link("https://api.vk.com/method/wall.get?owner_id=-180547513&count=20&filter=owner&$token&v=5.1");
    $out = '<div class="row">';
    $post = '<div class="col-lg-9 col-xl-12"><div class="container">';
    $grops = '<div class="col-lg-3 col-xl-12"><div class="container">';

    if (is_array($file) || is_object($file)) {
        foreach ($file as $item) {
            $text = '';
            foreach ($item['items'] as $value) {
                $link ='https://vk.com/wall'. $value['to_id'] . '_' . $value['id'];
                if (isset($value['text'])) {
                    $text = $value['text'];
                }
                if (isset($value['attachments'])) {
                    if (is_array($value['attachments']) || is_object($value['attachments'])) {
                        $img = '';

                        foreach ($value['attachments'] as $attachment => $key) {
                            if (isset($key['photo'])) {
                                $img = "<img src='" . $key['photo']['photo_1280'] . "' class='w-100'>";
                            } else {
                                $img = '';
                            }
//                            echo '<pre>';
//                            print_r($key);
//                            echo '</pre>';
                        }
                    }
                    echo $img;
                }

                $post .= '<div class="container_block">
                            <div class="container_block-content">
                                <div class="content_title">
                                    <div class="content_title-text">
                                        <p>' . $text . '</p>
                                    </div>
                                    <div class="content_title-photo">
                                        '.$img.'          
                                    </div>
                                </div>
                            </div>
                            <div class="container_block-footer">
                                <div class="footer_content">
                                    <div class="footer_content-text">
                                        <a href="'.$link.'" target="_blank">Ссылка на пост</a>
                                   </div>
                              </div>
                            </div>
                      </div>';
            }
        }


    }

    $post .= '</div></div>';
    $grops .= '</div></div>';
    $out .= $grops . $post . '</div>';
    return $out;
}
