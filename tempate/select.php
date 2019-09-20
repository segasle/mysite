<form method="post" class="row align-items-center">
    <div class="col-12 col-sm-12 col-md-8 col-lg-10 col-xl-10">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Сортировка</label>
            <select class="form-control" id="exampleFormControlSelect1" name="sel">
                <option value="old">Старые</option>
                <option value="new">Новые</option>
                <?php
                if ($_GET['page'] == 'project') {
                    ?>
                    <option value="default">По умолчанию</option>
                <?php }
                if ($_GET['page'] == 'comments') {
                    ?>
                    <option value="positive">Положительные</option>
                    <option value=negative">Отрицательные</option>
                <?php }
                ?>
            </select>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">
        <div class="form_grog">
            <button type="submit" name="submit">Получить</button>
        </div>
    </div>
</form>