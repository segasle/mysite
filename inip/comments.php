<h1>Отзывы</h1>
<?php
if (isset($_SESSION['data'])) {?>
    <form action="" method="post">
        <div class="form_grog">
            <p>Сообщения</p>
            <textarea class="form-control" name="text" placeholder="Сообщение"><?php echo @$_POST['text']; ?></textarea>
        </div>
        <div class="form_grog">
            <button type="submit" class="btn" name="submit">Отправить</button>
        </div>
    </form>
<?php
    if (isset($_POST['submit'])){
        $data = $_POST;
        $errors = array();
        if (empty($data['text'])){
            $errors[] = 'Сообщение пустое';
        }
        if (empty($errors)){

        }else{
            echo '<div class="errors">'.array_shift($errors).'</div>';
        }
    }
}else{?>
    <p class="h3">Авторизовуйтесь, чтобы написать отзыв</p>
<?php
}

?>