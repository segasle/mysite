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
        $sf = do_query("SELECT COUNT(*) as count FROM `comments` WHERE `email` ='{$_SESSION['data']['email']}'");
        $sf = $sf->fetch_object();
        if (empty($sf->count)){
            $res =  do_query("INSERT INTO `comments` (`text`, `name`, `email`) VALUES ('{$data['text']}','{$_SESSION['data']['name']}','{$_SESSION['data']['email']}')");
            if ($res){
                echo '<div class="go">Успешно отправлено</div>';
            }
        }else{
            echo '<div class="errors">Вы уже отправили отзыв!!!</div>';
        }

        }else{
            echo '<div class="errors">'.array_shift($errors).'</div>';
        }
    }
}else{?>
    <p class="h3">Авторизовуйтесь, чтобы написать отзыв</p>
<?php
}
$resist = do_query("SELECT * FROM `comments`");
if (mysqli_num_rows($resist) > 0){
    $out = '<div class="container">';
     foreach ($resist as $item){
         $out .= '<div class="container_block">
                     <div class="container_block-head">
                        <div class="head_block">
                            <div class="block_cell">
                               <p><i class="fa fa-user-secret fa-2x" aria-hidden="true"></i>'.$item['name'].'</p>
                            </div>
                            <div class="block_cell">
                                <p><i class="fa fa-calendar fa-2x" aria-hidden="true"></i>'.$item['data'].'</p>
                            </div>            
                        </div>       
                    </div>
                    <div class="container_block-content">
                        <div class="content_title">
                            <div class="content_title-text">
                                <p>'.$item['text'].'</p>
                            </div>
                        </div>
                    </div>
                </div>';
     }
     $out .= '</div>';
     echo $out;
}else{
    echo "<p class='h3'>Нет отзывов</p>";
}
?>