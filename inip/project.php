<h1>Проекты</h1>
<?php
include 'tempate/select.php';
if (isset($_POST['submit'])){
    $data = $_POST;
    if ($data['sel'] == 'new'){
        echo post_project('SELECT * FROM `projects` WHERE `order` = 1 ORDER BY `data` DESC ');

    }
    if ($data['sel'] == 'old'){
        echo post_project('SELECT * FROM `projects` WHERE `order` = 1 ORDER BY `data` ASC');

    }
    if ($data['sel'] == 'default'){
        echo post_project('SELECT * FROM `projects` WHERE `order` = 1');

    }
}else{
    echo post_project('SELECT * FROM `projects` WHERE `order` = 1');
}
?>
<h2>Подддержка</h2>
<?php
echo post_project('SELECT * FROM `projects` WHERE `order` = 0');
