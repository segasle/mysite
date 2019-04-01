<h1>Заказ проектов</h1>
<?php
$res = do_query("SELECT * FROM `products`");
$out = "<div class='container'><div class='row'>";
foreach ($res as $item) {
    $id = $item['id_products'];
    $out .= "<div class='col-lg-4 col-xs-12'>
                <div class='container_block'>
                    <div class='container_block-head'>
                        <p class='h3 text-center'>" . $item['name_products'] . "</p>
                    </div>
                    <div class='container_block-content'>
                    
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
            echo '<div class="container">
                    <form action="" method="post">
                        <div class="form-group">
                           <label for=""><p>Имя</p></label> 
                            <input type="email" class="form-control" placeholder="Имя" name="name">
                        </div>
                        <div class="form-group">
                           <label for=""><p>Email</p></label>
                            <input type="email" class="form-control" placeholder="Почта" name="email"> 
                        </div>
                        <div class="form-group">
                           <label for=""><p>Сообщение</p></label>
                            <textarea class="form-control" name="message"></textarea> 
                        </div>
                        <button type="submit" class="btn" name="order">Отправить</button>
                    </form>
            </div>';
        } else {
            $data = do_query("SELECT * FROM `users` JOIN `products` WHERE users.email = '{$_SESSION['data']['email']}' AND products.id_products = $id ");
            if ($data){
                $_SESSION['prod'] = $data;

                if (isset($_SESSION['prod'])){

                    echo '<pre>';
                    print_r($_SESSION['prod']);
                    echo '</pre>';
                    $fio ='';
                    $email ='';
                    $order ='';
                    foreach ($_SESSION['prod'] as $value){
                        $fio = 'Имя и фамилия: ' .$value['name'] .' '.$value['surname'];
                        $email = 'Почта: ' .$value['email'];
                        $order = 'Заказ: '.$value['name_products'];
                        //$sms = 'Сообщение: ' .$data['text'];
                    }

                    $mess = $fio . '<br>'.$email.'<br>'.$order.'<br>';
                    $to      = 'segasle@yandex.ru';
                    $subject = 'Заказ';
                    $message = "$mess";
                    $headers = 'From: segasle@kafe-lyi.ru' . "\r\n" .
                        'Reply-To: segasle@kafe-lyi.ru' . "\r\n" .
                        "Content-Type: text/html; charset=\"UTF-8\"\r\n"
                        .'X-Mailer: PHP/' . phpversion();

                    mail("$to", "$subject", "$message", "$headers");
                    echo '<div class="go">Успешно отправлено!</div>';
                }
            }
            //$data = do_query("SELECT * FROM `users` WHERE email = '{$_SESSION['data']['email']}'");

        }
    }
}
$out .= '</div></div>';
echo $out;
