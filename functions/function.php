<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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
    include 'inip/' . $file . '.php';
    include 'tempate/footer.php';

}

function do_query($query)
{
    global $mysqli;

    $result = mysqli_query($mysqli, $query);
    return $result;
}

function get_menu()
{
    $sql = do_query('SELECT * FROM `menu`');
    $output = "<ul>";
    foreach ($sql as $r) {
        $output .= "<li><a href='" . $r['url'] . "'>" . $r['title'] . "</a></li>";
    }
    return $output;
}

function post_project()
{
    $sql = do_query('SELECT * FROM `projects` WHERE 1');
    $out = '';

    while ($rs = mysqli_fetch_array($sql)) {
        $mydata = new DateTime($rs['data']);
        $out .= '<div class="maps"><div class="maps_container"><div class="maps_head"><img src="' . $rs['img'] . '"></div><div class="maps_title"><a target="_blank" href="' . $rs['link'] . '">' . $rs['title'] . '</a></div><div class="maps_data"><p>' . $mydata->format('d.m.Y') . '</p></div></div></div>';
    }
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
        $email = $data['email'];
        if (!empty($email) and !empty($data['password'])) {
            $resilt = mysqli_fetch_assoc(do_query("SELECT * FROM `users` WHERE `email` ='" . $email . "'"));
            if ($resilt) {
                session_start();
                $_SESSION['data'] = json_encode($resilt);
                header('location: ?page=main');
            }
        }
    }
}