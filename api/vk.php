<?php
$token = 'access_token=2a781b15096deeb8eca7d3a68555ca6e2a884f8b2a058c0789f15f513b8f9cccb50aafb8636ab5bf91a3f';
$id ='6783539';
$scope = 'friends,photos,audio,video,offline';
$v = '5.52';
$link = '<a href="https://oauth.vk.com/authorize?client_id='.$id.'&display=page&redirect_uri=&scope='.$scope.'&response_type=token&v='.$v.'">ссылка</a>';

function get_atbum(){
    global $token;
    $content = file_get_contents("https://api.vk.com/method/photos.get?owner_id=176938709&album_id=248623253&rev=1&$token&v=5.60");
    $photos = json_decode($content, true);
    $out = '<div class="atbum row">';
    foreach ($photos['response'] as $photo){
        if (!empty(is_array($photo) || is_object($photo))){
            foreach ($photo as $item){
                $data = date('d.m.Y H:m', $item['date']);
                $out .= '<div class="atbum_photo col-xs-12 col-sm-6 col-md-4 col-lg-2">'
                    .'<p>'.$item['text'].'</p><img src="'.$item['photo_604'].'" alt=""><p>'.$data.'</p></div>';
            }}
    }
    $out .= '</div>';
    return $out;
}
function user_page(){
    global $token;
    $content = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids=serg_slepenkov&fields=bdate,about,photo_400_orig&$token&v=5.92"), true);
    $fio = '';
    $img = ' <div class="abot">  <div class="abot_block">';
    $about = '<div class="abot_container"><h2>Коротко обо мне</h2>';
    foreach ($content['response'] as $item){
        $fio .= '<h1 class="text-center">'.$item['first_name'].' '.$item['last_name'].'</h1>';
        $img .= ' <img src="'.$item['photo_400_orig'].'" class="abot_img">';
        $about .= ' <p class="abot_container_text">'.$item['about'].'</p>';

    }

    $img .= '</div>';
    $about .= '</div></div>';
    $page = $fio . $img.$about;
    return $page;
}