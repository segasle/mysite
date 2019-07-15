<?php
$oktoken = 'tkn1cFAsEys07QIXAnPFkyZjG0aRb9b0wzPCwozZuT3SHe4pi1Gf1KC4ZQZCTz0t4IMA7';
$okkey = '38c7df7bde2f2a3594525bb240eed37d';
$okscope = 'VALUABLE_ACCESS,LONG_ACCESS_TOKEN,PHOTO_CONTENT,GET_EMAIL';
$okid = '1277595392';
$secretkey = '47B3C84B19EE3DBD5BF383B7';
function ok_authorization()
{

    global $redirect_uri;
    global $okscope;
    global $secretkey;
    global $okid;
    if (isset($_GET['code'])) {

        $result = false;

        $params = array(
            'code' => $_GET['code'],
            'redirect_uri' => $redirect_uri,
            'grant_type' => 'authorization_code',
            'client_id' => $okid,
            'client_secret' => $secretkey
        );

        $url = 'http://api.odnoklassniki.ru/oauth/token.do';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);
        curl_close($curl);

        $tokenInfo = json_decode($result, true);

        if (isset($tokenInfo['access_token']) && isset($public_key)) {
            $sign = md5("application_key={$public_key}format=jsonmethod=users.getCurrentUser" . md5("{$tokenInfo['access_token']}{$secretkey}"));

            $params = array(
                'method' => 'users.getCurrentUser',
                'access_token' => $tokenInfo['access_token'],
                'application_key' => $public_key,
                'format' => 'json',
                'sig' => $sign
            );

            $userInfo = json_decode(file_get_contents('http://api.odnoklassniki.ru/fb.do' . '?' . urldecode(http_build_query($params))), true);
           var_dump($userInfo);
            if (isset($userInfo['uid'])) {
                $result = true;
            }
        }

        if ($result) {
            echo "Социальный ID пользователя: " . $userInfo['uid'] . '<br />';
            echo "Имя пользователя: " . $userInfo['name'] . '<br />';
            echo "Ссылка на профиль пользователя: " . 'http://www.odnoklassniki.ru/profile/' . $userInfo['uid'] . '<br />';
            echo "Пол пользователя: " . $userInfo['gender'] . '<br />';
            echo "День Рождения: " . $userInfo['birthday'] . '<br />';
            echo '<img src="' . $userInfo['pic_2'] . '" />';
            echo "<br />";
        }
    }

 /*   if (!empty($_POST['code'])){
        $code = $_POST['code'];
        $file = file_link("https://api.ok.ru/oauth/token.do?code=".$code."&client_id=".$okid."&client_secret=".$secretkey."&redirect_uri=".$redirect_uri."&grant_type=authorization_code");

        $_SESSION['user'] = $file;
        if (isset($_SESSION['user'])){
            $access_token = $_SESSION['user']['access_token'];
            $users = file_link("https://api.ok.ru/oauth/token.do?refresh_token=".$access_token."&client_id=".$okid."&client_secret=".$secretkey."&grant_type=refresh_token");

            echo '<pre>';
            print_r($users);
            echo '</pre>';
        }



    }
    return;*/
}


function send_post($post_url,$post_data)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $post_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "coocie.dat");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "coocie.dat");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:9.0.1) Gecko/20100101 Firefox/9.0.1");
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
};

if (empty($_GET['code']))
{
    header('location http://www.odnoklassniki.ru/oauth/authorize?client_id=$clientId&scope=$scope&response_type=code&redirect_uri=http://site/this.php');
}else{
    $url='http://api.odnoklassniki.ru/oauth/token.do';
    $data = array(
        'code '=>$_GET['code'],
        'redirect_uri'=>'http://site/this.php',
        'grant_type'=>'authorization_code',
        'client_id'=>$clientId,
        'client_secret'=>$client_secret
    );
    $data=json_decode(send_post($url,$data));
    $token = $data->access_token;
}
