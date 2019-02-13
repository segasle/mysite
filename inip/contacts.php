<h1>Контакты</h1>
<div class="block-auto">
    <?php
    echo get_contact();
    ?>
</div>

<div class="form">
    <h2>Хотите сотрудничать?</h2>
    <div class="form_grog">
        <?php feedback();
        event_mail();
        ?>
    </div>
    <form action="" method="post">

        <div class="form_grog">
            <p>Ваше имя</p>
            <input type="text" name="name" placeholder="Имя" value="<?php echo @$_POST['name']; ?>"></div>
        <div class="form_grog">
            <p>Ваша почта</p>
            <input type="email" name="email" placeholder="Почта"></div>
        <div class="form_grog">
            <p>Какая тема</p>
            <input type="text" name="topic" placeholder="Тема"></div>
        <div class="form_grog">
            <p>Текст</p>
            <textarea cols="30" rows="10" name="text" placeholder="Сообщение"></textarea></div>
        <div class="form_grog">
            <button type="submit" name="submit">Отправить</button>
        </div>
    </form>
</div>