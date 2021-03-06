<h1>Отзывы</h1>
<?php
if (isset($_SESSION['data'])) { ?>
    <form action="" method="post">
        <div class="radio">
            <input type="radio" name="radio" value="negative" class="d-none" id="negative">
            <label for="negative" class="fas fa-frown-open fa-3x"></label>
            <input type="radio" name="radio" value="positive" id="positive" class="d-none" checked="checked">
            <label for="positive" class="fas fa-grin-alt fa-3x"></label>
        </div>
        <div class="form_grog">
            <p>Сообщения</p>
            <textarea class="form-control" name="text" placeholder="Сообщение"><?php echo @$_POST['text']; ?></textarea>
        </div>
        <div class="form_grog">
            <button type="submitform" class="btn" name="submit">Отправить</button>
        </div>
    </form>
    <?php
    if (isset($_POST['submitform'])) {
        $data = $_POST;
        $errors = array();
        if (empty($data['text'])) {
            $errors[] = 'Сообщение пустое';
        }

        if (empty($errors)) {
            $sf = do_query("SELECT COUNT(*) as count FROM `comments` WHERE `email` ='{$_SESSION['data']['email']}'");
            $sf = $sf->fetch_object();
            if (empty($sf->count)) {
                $res = do_query("INSERT INTO `comments` (`text`, `name`, `email`, `assessment`) VALUES ('{$data['text']}','{$_SESSION['data']['name']}','{$_SESSION['data']['email']}','{$data['radio']}')");
                if ($res) {
                    echo '<div class="go">Успешно отправлено</div>';
                }
            } else {
                echo '<div class="errors">Вы уже отправили отзыв!!!</div>';
            }

        } else {
            echo '<div class="errors">' . array_shift($errors) . '</div>';
        }
    }
} else {
    ?>
    <p class="h3">Авторизовуйтесь, чтобы написать отзыв</p>
    <?php
}
include 'tempate/select.php';

if (isset($_POST['submit'])) {
    $data = $_POST;
    if ($data['sel'] == 'new') {
        post_comments('SELECT * FROM `comments` ORDER BY `data` DESC ');

    }
    if ($data['sel'] == 'old') {
        post_comments('SELECT * FROM `comments` ORDER BY `data` ASC');

    }
    if ($data['sel'] == 'negative') {
        post_comments("SELECT * FROM `comments` WHERE `assessment` = 'negative'");

    }
    if ($data['sel'] == 'positive') {
        post_comments("SELECT * FROM `comments` WHERE `assessment` = 'positive'");

    }
} else {
    post_comments("SELECT * FROM `comments`");
}
function post_comments($sql)
{
    $resist = do_query($sql);
    if (mysqli_num_rows($resist) > 0) {
        $out = '<div class="container">';
        foreach ($resist as $item) {
            $date = new DateTime($item['data']);
            $out .= '<div class="container_block">
                     <div class="container_block-head">
                        <div class="head_block">
                            <div class="block_cell">
                               <p><i class="fa fa-user-secret fa-2x" aria-hidden="true"></i>' . $item['name'] . '</p>
                            </div>
                            <div class="block_cell">
                                <p class="text-right data"><i class="fa fa-calendar fa-2x" aria-hidden="true"></i>' . $date->format('d.m.Y H:i:s') . '</p>
                            </div>            
                        </div>       
                    </div>
                    <div class="container_block-content">
                        <div class="content_title">
                            <div class="content_title-text">
                                <p>' . $item['text'] . '</p>
                            </div>
                        </div>
                    </div>
                </div>';
        }
        $out .= '</div>';
        echo $out;
    } else {
        echo "<p class='h3'>Нет отзывов</p>";
    }
}