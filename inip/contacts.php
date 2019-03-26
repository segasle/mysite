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
        <div class="form_grog">
            <p> Введите код с картинки:</p>
            <input type="text" name="captcha">
            <img title="Щёлкните для нового кода" alt="Код" src="functions/jcaptcha/jcaptcha.php"
                 style="border: 1px solid #000000"
                 onclick="this.src='functions/jcaptcha/jcaptcha.php?id=' + (+new Date());"></div>
        <div class="form_grog">
            <button type="submit" name="submit">Отправить</button>
        </div>
    </form>
    <?php

    //echo $_SESSION['randomnr2'];
    if (isset($_POST['submit'])) {

      //  require 'functions/jcaptcha/jcaptcha.php';
        //define('CAPTCHA_COOKIE', 'imgcaptcha_');
        // заметим: поле `captcha` обязательно для заполнения
        if (empty($_POST['captcha']) || md5($_POST['captcha']) != $_SESSION['randomnr2']) {
            echo 'Неверный код с картинки. Вернитесь и повторите попытку.';
        }else{
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
            } if (empty($errors)) {
                if (!empty($result)) {
                    $wer = do_query("INSERT INTO feedback (`name`, `email`, `topic`, `text`) VALUES ('.$name.', '.$email.', '.$topic.', '.$text.')");
                    if (!empty($wer)) {
                        echo '<div class="go">Успешно отправлено!</div>';
                    }
                }
            } else {
                echo '<div class="errors">' . array_shift($errors) . '</div>';
            }
        }

    }
    ?>
</div>