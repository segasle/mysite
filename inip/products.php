<h1>Заказ проектов</h1>
<?php
$res = do_query("SELECT * FROM `products`");
$query = do_query("SELECT * FROM `descriptions_products` JOIN `products` WHERE products.id_products = descriptions_products.id_id_products");

$out = "<div class='container' style='max-width: 775px'><div class='row'>";
foreach ($res as $item) {
    $id = $item['id_products'];
    $des = '';
    foreach ($query as $items) {
        if ($id == $items['id_id_products']) {
            $des .= "<li><p><i class='fa fa-check-square-o fa-2x'></i>" . $items['description'] . "</p></li>";

            echo '<pre>';
            print_r($items['description']);
            echo '</pre>';
        }
    }
    $out .= "<div class='col-lg-4 col-xs-12 col-sm-12'>
                <div class='container_block'>
                    <div class='container_block-head'>
                        <p class='h3 text-center'>" . $item['name_products'] . "</p>
                    </div>
                    <div class='container_block-content' style='height: 230px;'>
                    <div class='content_head'>
                    <p class='h5'>В стоимость входит</p>
</div>
                    <ul>
                  " . $des . "
</ul>
                    </div>
                    <div class='container_block-footer'>
                        <div class='footer_content'>
                            <div class='footer_content-text'>
                                <p class='h4 text-center'>От " . $item['price'] . "руб</p>
                            </div> 
                            <div class='footer_content-form'>
                                <form action='' method='post'>
                                    <div class='form-group'>
                                        <button type='submit' class='btn w-100' name='" . $id . "'>Заказать</button>
                                    </div>
                                </form>
                            </div>
                       </div>
                    </div>
                </div>
            </div>";
    if (isset($_POST[$id])) {
        if (!isset($_SESSION['data'])) {
            // echo '<p class="h3 text-center">Авторизовуйтесь пожалуйста, чтобы заказать сайт</p>';
            echo '<p class="h3 text-center">Заполните анкету</p>';
            echo ' <form action=\'\' method=\'post\'>
                                  <div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user-circle fa-3x" aria-hidden="true"></i></span>
  <input type="text" class="form-control" name="name" placeholder="Имя" aria-describedby="sizing-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></span>
  <input type="text" class="form-control" name="email" placeholder="Email" aria-describedby="sizing-addon2">
</div>

<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-commenting fa-3x" aria-hidden="true"></i></span>
  <textarea cols="10" rows="10" class="form-control" name="sms" placeholder="Cообщения" aria-describedby="sizing-addon3"></textarea>
</div>=
 <div class=\'form-group\'>
                                        <button type=\'submit\' class=\'btn w-100\' name="submit">Отправить</button>
                                    </div>
                                </form>';
            if (isset($_POST['submit'])) {
                $data = $_POST;
                $errors = array();
                $email = $data['email'];
                if (empty($data['name'])) {
                    $errors[] = 'Не ввели имя';
                }
                if (empty($data['email'])) {
                    $errors[] = 'Вы не ввели почту';
                }
                if (!preg_match("/^(?!.*@.*@.*$)(?!.*@.*\-\-.*\..*$)(?!.*@.*\-\..*$)(?!.*@.*\-$)(.*@.+(\..{1,11})?)$/", "$email")) {
                    $errors[] = 'Вы неправильно ввели электронную почту';
                }
                if (empty($errors)) {
                    if (empty($data['sms'])) {
                        $sms = null;
                    } else {
                        $sms = $data['sms'];
                    }
                    $gas = do_query("INSERT INTO `order`(`id`, `name`, `email`, `sms`) VALUES ([value-1],[value-2],[value-3],[value-4])");
                } else {
                    echo '<div class="errors">' . array_shift($errors) . '</div>>';
                }
            }
        } else {
            $data = do_query("SELECT * FROM `users` JOIN `products` WHERE users.email = '{$_SESSION['data']['email']}' AND products.id_products = $id ");
            if ($data) {
                $_SESSION['prod'] = $data;

                if (isset($_SESSION['prod'])) {
//
//                    echo '<pre>';
//                    print_r($_SESSION['prod']);
//                    echo '</pre>';
                    $fio = '';
                    $email = '';
                    $order = '';
                    foreach ($_SESSION['prod'] as $value) {
                        $fio = 'Имя и фамилия: ' . $value['name'] . ' ' . $value['surname'];
                        $email = 'Почта: ' . $value['email'];
                        $order = 'Заказ: ' . $value['name_products'];
                        //$sms = 'Сообщение: ' .$data['text'];
                    }

                    $mess = $fio . '<br>' . $email . '<br>' . $order . '<br>';
                    $to = 'segasle@yandex.ru';
                    $subject = 'Заказ';
                    $message = "$mess";
                    $headers = 'From: segasle@kafe-lyi.ru' . "\r\n" .
                        'Reply-To: segasle@kafe-lyi.ru' . "\r\n" .
                        "Content-Type: text/html; charset=\"UTF-8\"\r\n"
                        . 'X-Mailer: PHP/' . phpversion();

                    mail("$to", "$subject", "$message", "$headers");
                    unset($_SESSION['prod']);
                    echo '<div class="go">Успешно отправлено!</div>';
                }
            }
            //$data = do_query("SELECT * FROM `users` WHERE email = '{$_SESSION['data']['email']}'");


        }
    }
}
$out .= '</div></div>';
echo $out;
