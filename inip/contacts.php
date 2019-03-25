<h1>Контакты</h1>
<div class="block-auto">
    <?php
    echo get_contact();
    ?>
</div>

<div class="form">
    <h2>Хотите сотрудничать?</h2>
    <div class="form_grog">
       <?php event_mail();
        ?>
    </div>
    <form action="" method="post">

        <div class="form_grog">
            <p>Ваше имя</p>
            <input type="text" name="name" placeholder="Имя" value="<?php echo @$_POST['name']; ?>"></div>
        <div class="form_grog">
            <p>Ваша почта</p>
            <input type="email" name="email" placeholder="Почта" value="<?php echo @$_POST['email']; ?>"></div>
        <div class="form_grog">
            <p>Какая тема</p>
            <input type="text" name="topic" placeholder="Тема" value="<?php echo @$_POST['topic']; ?>"></div>
        <div class="form_grog">
            <p>Текст</p>
            <textarea cols="30" rows="10" name="text" placeholder="Сообщение"><?php echo @$_POST['text']; ?></textarea>
        </div>
        <div class="g-recaptcha" data-sitekey="6LcQ5JkUAAAAALQDfLsbMFe9V7C3zTUmzNxSkyGa"></div>
        <div class="form_grog">
            <button type="submit" name="submit">Отправить</button>
        </div>
    </form>
    <?php

    if (isset($_POST['submit'])) {
        $data = $_POST;
        $name = htmlentities($data['name'], ENT_QUOTES);
        $topic = htmlentities($data['topic'], ENT_QUOTES);
        $text = htmlentities($data['text'], ENT_QUOTES);
        $result = do_query("SELECT COUNT(*) as count FROM feedback WHERE `email` = '{$data['email']}'");
        $result = $result->fetch_object();
        $errors = array();
        $email = $data['email'];
        if (empty($data['name'])) {
            $errors[] = 'Вы не ввели имя';
        }
        if (empty($data['email'])) {
            $errors[] = 'Вы не ввели почту';
        }
        if (!preg_match("/^(?!.*@.*@.*$)(?!.*@.*\-\-.*\..*$)(?!.*@.*\-\..*$)(?!.*@.*\-$)(.*@.+(\..{1,11})?)$/", "$email")) {
            $errors[] = 'Вы неправильно ввели электронную почту';
        }
        if (empty($data['topic'])) {
            $errors[] = 'Вы не ввели тему';
        }
        if (empty($data['text'])) {
            $errors[] = 'Вы не ввели текст';
        }
        if (!$_POST['g-recaptcha-response']) {
            $errors[] = 'Запомните капчу';
        }
        if (empty($errors)) {
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $key = '6LcQ5JkUAAAAAGF_DSum3xSye4lgR8Lj8Hwa5diD';
            $query = $url . '?secret=' . $key . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR'];
            $success = json_decode(file_get_contents($query));
            if ($success->success == false) {
                exit('Капча введена неверно');
            } else {
                if (!empty($result)) {
                    $wer = do_query("INSERT INTO feedback (`name`, `email`, `topic`, `text`) VALUES ('.$name.', '.$email.', '.$topic.', '.$text.')");
                    if (!empty($wer)) {
                        echo '<div class="go">Успешно отправлено!</div>';
                    }
                }
            }

        } else {
            echo '<div class="errors">' . array_shift($errors) . '</div>';
        }
    }
    ?>
</div>