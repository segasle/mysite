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
    include  $file . '.php';
    include 'tempate/footer.php';

}
function do_query($query)
{
    global $mysqli;

    $result = mysqli_query($mysqli, $query);
    return $result;
}
function get_menu(){
    $sql = do_query('SELECT * FROM `menu` WHERE `patent` = "0" ORDER BY menu.id');
    $output = "<ul>";
    while ($rs = mysqli_fetch_array($sql)){
        $output .= "<li><a href='".$rs['url']."'>".$rs['title']."</a></li>";
    }
    $output .= "<ul>";
    return $output;
}
function feedback(){
    if (isset($_POST['submit'])){
        $data = $_POST;
        $result = do_query("SELECT COUNT(*) as count FROM feedback WHERE `email` = '{$data['email']}'");
        $result = $result->fetch_object();
        $errors = array();
        if (empty($data['name'])){
            $errors = 'Вы не ввели имя';
        }
        if (empty($data['email'])){
            $errors = 'Вы не ввели почту';
        }
        if (empty($data['topic'])){
            $errors = 'Вы не ввели тему';
        }
        if (empty($data['text'])){
            $errors = 'Вы не ввели текст';
        }
        if (empty($errors)){
            if (!empty($result)){
                $wer =  do_query("INSERT INTO feedback (`name`, `email`, `topic`, `text`) VALUES ('{$data['name']}', '{$data['email']}', '{$data['topic']}', '{$data['text']}')");
                if (!empty($wer)){
                    echo '<div style="
                                    background: green; 
                                    color: white;
                                    font-size: 15px;
                                    padding: 5px 10px;">Успешно отправлено!</div>';
                }
            }
        }
        else{
            echo '<div style="background: red; 
                                color: white;
                                font-size: 15px;
                                padding: 5px 10px;">'.$errors.'</div cl>';
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