<?php
header('Content-Type: text/html; charset=utf-8');
define('WP_DEBUG', true);
define('WP_CACHE', false);
function connections()
{
    $file = '';
    if (empty($_GET['page'])) {
        $file = 'main';
    } else {
        $file = $_GET['page'];
    }
    include 'tempate/header.php';
    if (file_exists('inip/' . $file . '.php')) {
        include 'inip/' . $file . '.php';
    } else {
        include 'users/' . $file . '.php';
    }
    include 'tempate/footer.php';

}

function do_query($query)
{
    global $mysqli;
    $result = mysqli_query($mysqli, $query);
    return $result;
}

function file_link($link)
{
    $file = json_decode(file_get_contents($link), true);
    return $file;
}

function get_menu()
{
    $url = basename($_SERVER['REQUEST_URI']);
    $sql = do_query('SELECT * FROM `menu`');
    $output = "<ul>";
    // $active = '';
    foreach ($sql as $r) {
        if ($r['url'] === $url) {
            $active = 'active';
        } else {
            $active = '';
        }
        $output .= "<li class='" . $active . "'><a href='" . $r['url'] . "'>" . $r['title'] . "</a></li>";
    }
    return $output;
}

function curl($link)
{

    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, $link);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    $jsonData = json_decode(curl_exec($curlSession), true);
    curl_close($curlSession);
    return $jsonData;
}

function link_authorization()
{
    global $scope;
    global $okscope;
    global $redirect_uri;
    global $id;
    global $okid;
    global $fbid;
    global $fbsecretkey;
    global $fbscope;
    global $yaid;

    $out = '';
    if (empty($_SESSION['token'])) {
        $out = ' <a href="https://oauth.vk.com/authorize?client_id=' . $id . '&display=page&redirect_uri=' . $redirect_uri . '&scope=' . $scope . '&response_type=code&v=5.92" class="fa fa-vk fa-2x" aria-hidden="true"></a><a href="https://connect.ok.ru/oauth/authorize?client_id=' . $okid . '&scope=' . $okscope . '&response_type=code&redirect_uri=' . $redirect_uri . '&state=state" class="fa fa-odnoklassniki fa-2x" aria-hidden="true"></a><a href="https://www.facebook.com/v3.3/dialog/oauth?client_id=' . $fbid . '&redirect_uri=' . $redirect_uri . '&response_type=code&scope=' . $fbscope . '" class="fa fa-facebook fa-2x" aria-hidden="true"></a><a href="https://oauth.yandex.ru/authorize?response_type=token&client_id=' . $yaid . '&redirect_uri=' . $redirect_uri . '" class="fab fa-yandex fa-2x" aria-hidden="true"></a>';
    }
    return $out;
}

function post_project()
{
    $sql = do_query('SELECT * FROM `projects` WHERE 1');
    $out = '<div class="row">';

    while ($rs = mysqli_fetch_array($sql)) {
        $mydata = new DateTime($rs['data']);
        $out .= '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3"><div class="maps"><div class="maps_container"><div class="maps_head overflow-hidden h-210 h-410"><img src="' . $rs['img'] . '"></div><div class="maps_title"><a target="_blank" href="' . $rs['link'] . '">' . $rs['title'] . '</a></div><div class="maps_data"><p>' . $mydata->format('d.m.Y') . '</p></div></div></div></div>';
    }
    $out .= '</div>';

    return $out;
}

function get_contact()
{
    $sql = do_query('SELECT * FROM `meta_contact` WHERE 1');
    $out = '<div class="info">';
    while ($rs = mysqli_fetch_array($sql)) {
        $mydata = new DateTime($rs['birthday']);
        $out .= '
                  <div class="info_fio">
                    <p><span>фио: </span>' . $rs['fio'] . '</p>
                 </div>
                    <div class="info_birthday">
                        <p><span>др: </span>' . $mydata->format('d.m.Y') . '</p>
                    </div>                 
                     <div class="info_email">
                    <p><span>почта: </span><a href="mailto:' . $rs['email'] . ' ">' . $rs['email'] . '</a></p>
                 </div>
              </div>';
    }
    return $out;
}

function reg()
{
    if (isset($_POST['submitreg'])) {
        $data = $_POST;
        if (isset($data['check'])) {
            $errors = array();
            $email = $data['emailreg'];
            if (empty($email)) {
                $errors[] = 'Не ввели почту';
                if (!preg_match("/^(?!.*@.*@.*$)(?!.*@.*\-\-.*\..*$)(?!.*@.*\-\..*$)(?!.*@.*\-$)(.*@.+(\..{1,11})?)$/", "$email")) {
                    $errors[] = 'Вы неправильно ввели электронную почту';
                }
            }

            if (empty($data['passwordreg']) or strlen($data['passwordreg']) < 8) {
                $errors[] = 'Короткий пароль';
            }
            if ($data['passwordreg2'] != $data['passwordreg']) {
                $errors[] = 'Не совпадает пароль';
            }
            if (empty($data['namereg']) or strlen($data['namereg']) < 2) {
                $errors[] = 'Не ввели имя';
            }
            if (empty($errors)) {
                $result = do_query("SELECT COUNT(*) as count FROM users WHERE `email` = '{$email}'");
                $result = $result->fetch_object();
                if (empty($result->count)) {
                    $query = do_query("INSERT INTO `users`(`email`, `name`,`password`) VALUES ('{$email}','{$data['namereg']}','" . password_hash($data['passwordreg2'], PASSWORD_DEFAULT) . "')");
                    if ($query) {
                        echo '<div class="go">Успешно зарегистровались</div>';
                    }
                } else {
                    $result = mysqli_fetch_array(do_query("SELECT * FROM `users` "));
                    //$result = $result->fetch_object();
                    if ($result['password'] == null) {
                        $quer = do_query("UPDATE `users` SET `password` = '" . password_hash($data['passwordreg2'], PASSWORD_DEFAULT) . "' WHERE `email` = '" . $email . "'");

                        if ($quer) {
                            echo '<div class="go">Успешно зарегистровались</div>';
                        }

                    } else {
                        echo '<div class="errors">Аккаунт уже создан</div>';

                    }

                }
            } else {
                echo '<div class="errors">' . array_shift($errors) . '</div>';
            }
        } else {
            echo '<div class="errors"> Не поставили галочку</div>';
        }
        //return $out;
        //echo '';
    }

}


function ajax_reg($req_data)
{
    // КОДЫ ОШИБОК ДЛЯ AJAX
    // 0 - неизвестная ошибка
    // 1 - все ОК
    // 2 - Аккаунт уже создан
    // 3 - Не поставили галочку
    // 4 - ошибка email (не ввели)
    // 5 - ошибка пароля (короткий)
    // 6 - ошибка пароля (не совпадает)
    // 7 - ошибка имени
    // 8 - ошибка email (не правильно ввели)
    $data = $req_data;
    if (isset($data['check'])) {
        $email = $data['emailreg'];
        if (empty($email)) {
            return 4;
        } elseif (!preg_match("/^(?!.*@.*@.*$)(?!.*@.*\-\-.*\..*$)(?!.*@.*\-\..*$)(?!.*@.*\-$)(.*@.+(\..{1,11})?)$/", "$email")) {
            return 8;
        }
        if (empty($data['passwordreg']) or strlen($data['passwordreg']) < 8) {
            return 5;
        }
        if ($data['passwordreg2'] != $data['passwordreg']) {
            return 6;
        }
        if (empty($data['namereg']) or strlen($data['namereg']) < 2) {
            return 7;
        }
        if (empty($errors)) {
            $result = do_query("SELECT COUNT(*) as count FROM users WHERE `email` = '{$email}'");
            $result = $result->fetch_object();
            if (empty($result->count)) {
                $query = do_query("INSERT INTO `users`(`email`, `name`,`password`) VALUES ('{$email}','{$data['namereg']}','" . password_hash($data['passwordreg2'], PASSWORD_DEFAULT) . "')");
                if ($query) {
                    return 1;
                }
            } else {
                $result = mysqli_fetch_array(do_query("SELECT * FROM `users` "));
                //$result = $result->fetch_object();
                if ($result['password'] == null) {
                    $quer = do_query("UPDATE `users` SET `password` = '" . password_hash($data['passwordreg2'], PASSWORD_DEFAULT) . "' WHERE `email` = '" . $email . "'");
                    if ($quer) {
                        return 1;
                    }
                } else {
                    return 2;
                }
            }
        } else {
            return 0;
        }
    } else {
        return 3;
    }
    return 0;
}

function recovery()
{
    if (isset($_POST['submitrecovery'])) {
        $data = $_POST;
        $email = $data['emailrecovery'];
        $errors = array();
        if (empty($email)) {
            $errors[] = 'Не ввели почту';
            if (!preg_match("/^(?!.*@.*@.*$)(?!.*@.*\-\-.*\..*$)(?!.*@.*\-\..*$)(?!.*@.*\-$)(.*@.+(\..{1,11})?)$/", "$email")) {
                $errors[] = 'Вы неправильно ввели электронную почту';
            }
        }
        if (empty($data['passwordrecovery']) or strlen($data['passwordrecovery']) < 8) {
            $errors[] = 'Короткий пароль';
        }
        if ($data['passwordrecovery2'] != $data['passwordrecovery']) {
            $errors[] = 'Не совпадает пароль';
        }
        if (empty($errors)) {
            $result = do_query("SELECT COUNT(*) as count FROM users WHERE `email` = '{$email}'");
            $result = $result->fetch_object();
            if (!empty($result->count)) {
                $quer = do_query("UPDATE `users` SET `password` = '" . password_hash($data['passwordrecovery2'], PASSWORD_DEFAULT) . "' WHERE `email` = '" . $email . "'");
                if ($quer) {
                    echo '<div class="go"> Пароль удачно сменён</div>';

                }
            } else {
                echo '<div class="errors">Такого аккаунта нет</div>';
            }
        } else {
            echo '<div class="errors">' . array_shift($errors) . '</div>';

        }

    }
}

function login()
{
    if (isset($_POST['submit'])) {
        $data = $_POST;
        $email = $data['email'];
        $password = $data['password'];
        $errors = array();
        if (empty($email)) {
            $errors[] = 'Не ввели почту';
            if (!preg_match("/^(?!.*@.*@.*$)(?!.*@.*\-\-.*\..*$)(?!.*@.*\-\..*$)(?!.*@.*\-$)(.*@.+(\..{1,11})?)$/", "$email")) {
                $errors[] = 'Вы неправильно ввели электронную почту';
            }
        }
        if (empty($errors)) {
            $res = mysqli_fetch_assoc(do_query("SELECT * FROM `users` WHERE `email` = '" . $email . "'"));
            if ($res) {
                if (!password_verify($password, $res['password'])) {
                    echo '<div class="errors">Неверный пароль</div>';
                }
            } else {
                echo '<div class="errors">Такого аккаунта нет</div>';
            }
        } else {
            echo '<div class="errors">' . array_shift($errors) . '</div>';
        }
    }
}

function user_login()
{
    if (isset($_POST['submit'])) {
        $data = $_POST;
        if (isset($data['email'])) {
            $email = $data['email'];
            if (!empty($email) and !empty($data['password'])) {
                $resilt = mysqli_fetch_assoc(do_query("SELECT * FROM `users` WHERE `email` ='" . $email . "'"));
                if ($resilt) {
                    //    session_start();
                    $_SESSION['data'] = $resilt;
                    header('location: ?page=main');
                    //echo  print_r($_SESSION['data']);
                }
            }
        }
    }
}