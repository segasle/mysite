<h1>Проекты</h1>
<form method="post" class="row align-items-center">
    <div class="col-12 col-sm-12 col-md-8 col-lg-10 col-xl-10">
        <div class="form-group">
            <label for="exampleFormControlSelect1"></label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Старые</option>
                <option>Новые</option>
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
echo post_project();
?>