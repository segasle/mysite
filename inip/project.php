<h1>Проекты</h1>
<form method="post" class="row align-items-center">
    <div class="col-12 col-sm-12 col-md-8 col-lg-10 col-xl-10">
        <div class="form-group">
            <label for="exampleFormControlSelect1"></label>
            <select class="form-control" id="exampleFormControlSelect1" name="sel">
                <option value="old">Старые</option>
                <option value="new">Новые</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">
        <div class="form_grog">
            <button type="submit" name="submit">Получить</button>
        </div>
    </div>
</form>
<?php
if (isset($_POST['submit'])){
    $data = $_POST;
    if ($data['sel'] == 'new'){
        echo post_project('SELECT * FROM `projects` ORDER BY id DESC ');

    }
    if ($data['sel'] == 'old'){
        echo post_project('SELECT * FROM `projects`');

    }
}else{
    echo post_project('SELECT * FROM `projects`');

}
?>