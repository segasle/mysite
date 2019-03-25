<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
header('Content-Type: text/html; charset=utf-8');

define('WP_DEBUG', true);
define('WP_CACHE', false);
function connections(){
    $file = '';
    if (empty($_GET['page'])){
        $file = 'main';
    }else{
        $file = $_GET['page'];
    }
    include 'tempate/header.php';
    include 'inip/'. $file . '.php';
    include 'tempate/footer.php';

}
function do_query($query)
{
    global $mysqli;

    $result = mysqli_query($mysqli, $query);
    return $result;
}
function get_menu(){
    $sql = do_query('SELECT * FROM `menu`');
    $output = "<ul>";
     foreach ($sql as $r){
        $output .= "<li><a href='".$r['url']."'>".$r['title']."</a></li>";
    }
    return $output;
}
function feedback(){
    if (isset($_POST['submit'])){
        $data = $_POST;
        $name = htmlentities($data['name'], ENT_QUOTES);
        $topic = htmlentities($data['topic'], ENT_QUOTES);
        $text = htmlentities($data['text'], ENT_QUOTES);
        $result = do_query("SELECT COUNT(*) as count FROM feedback WHERE `email` = '{$data['email']}'");
        $result = $result->fetch_object();
        $errors = array();
        $email = $data['email'];
        if (empty($data['name'])){
            $errors[] = 'Вы не ввели имя';
        }
        if (empty($data['email'])){
            $errors[] = 'Вы не ввели почту';
        }
        if (!preg_match("/^(?!.*@.*@.*$)(?!.*@.*\-\-.*\..*$)(?!.*@.*\-\..*$)(?!.*@.*\-$)(.*@.+(\..{1,11})?)$/", "$email")) {
            $errors[] = 'Вы неправильно ввели электронную почту';
        }
        if (empty($data['topic'])){
            $errors[] = 'Вы не ввели тему';
        }
        if (empty($data['text'])){
            $errors[] = 'Вы не ввели текст';
        }
        if (empty($errors)){
            if (!empty($result)){
                $wer =  do_query("INSERT INTO feedback (`name`, `email`, `topic`, `text`) VALUES ('.$name.', '.$email.', '.$topic.', '.$text.')");
                if (!empty($wer)){
                    echo '<div class="go">Успешно отправлено!</div>';
                }
            }
        }
        else{
            echo '<div class="errors">'.array_shift($errors).'</div>';
        }
    }
    return;
}
function event_mail(){
    if (isset($_POST)){
        $data = $_POST;
        if (!empty($data)){
            $messi = array(
                'Имя' => "{$data['name']}",
                'Почта' => "{$data['email']}",
                'Тема' => "{$data['topic']}",
                'Сообщение' => "{$data['text']}",
            );
            foreach ($messi as $key => $value){
                $asd = $messi;
            }
            $mess = implode("", $asd);
            $to      = 'segasle@yandex.ru';
            $subject = 'Обратная связь';
            $message = "$mess";
            $headers = 'From: segasle@kafe-lyi.ru' . "\r\n" .
                'Reply-To: segasle@kafe-lyi.ru' . "\r\n" .
                "Content-Type: text/plain; charset=\"UTF-8\"\r\n"
                .'X-Mailer: PHP/' . phpversion();

            mail("$to", "$subject", "$message", "$headers");

        }
    }
    return;
}
function post_project(){
    $sql = do_query('SELECT * FROM `projects` WHERE 1');
    $out = '';

    while ($rs = mysqli_fetch_array($sql)){
        $mydata = new DateTime($rs['data']);
        $out .= '<div class="maps"><div class="maps_container"><div class="maps_head"><img src="'.$rs['img'].'"></div><div class="maps_title"><a target="_blank" href="'.$rs['link'].'">'.$rs['title'].'</a></div><div class="maps_data"><p>'.$mydata->format('d.m.Y').'</p></div></div></div>';
    }
    return $out;
}
function get_contact(){
    $sql = do_query('SELECT * FROM `meta_contact` WHERE 1');
    $out = '<div class="info">';
    while ($rs = mysqli_fetch_array($sql)){
        $mydata = new DateTime($rs['birthday']);
      $out .= '
                  <div class="info_fio">
                    <p><span>фио: </span>'.$rs['fio'].'</p>
                 </div>
                    <div class="info_birthday">
                        <p><span>др: </span>'.$mydata->format('d.m.Y').'</p>
                    </div>                 
                     <div class="info_email">
                    <p><span>почта: </span><a href="mailto:'.$rs['email'].' ">'.$rs['email'].'</a></p>
                 </div>
              </div>';
    }
    return $out;
}

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
    echo $out;
    return;
}
