
$(function() {

    $("body").css({padding:0,margin:0});
    var f = function() {
        $(".ndra-container").css({position:"relative"});
        var h1 = $("body").height();
        var h2 = $(window).height();
        var d = h2 - h1;
        var h = $(".ndra-container").height() + d;
        var ruler = $("<div>").appendTo(".ndra-container");
        h = Math.max(ruler.position().top,h);
        ruler.remove();
        $(".ndra-container").height(h);
    };
    setInterval(f,1000);
    $(window).resize(f);
    f();


    $('#check-show-pw').change(function() {
        var pwValue = $('#passwordreg').val();
        var pwValue2 = $('#passwordreg2').val();
        if (this.checked) {
            $('#check-show-pw').attr('checked', 'checked');
            var showPassword = $('<input type="text" class="form-control" name="passwordreg" id ="passwordreg" placeholder="Введите пароль" value="'+pwValue+'">');
            var showPassword2 = $('<input type="text" class="form-control" name="passwordreg2" id ="passwordreg2" placeholder="Введите пароль" value="'+pwValue2+'">');
            $('#passwordreg').replaceWith(showPassword);
            $('#passwordreg2').replaceWith(showPassword2);
        } else {
            $('#check-show-pw').removeAttr('checked', 'checked');
            var hidePassword = $('<input type="password" class="form-control" name="passwordreg" id ="passwordreg" placeholder="Введите пароль" value="'+pwValue+'">');
            var hidePassword2 = $('<input type="password" class="form-control" name="passwordreg2" id ="passwordreg2" placeholder="Введите пароль" value="'+pwValue2+'">');
            $('#passwordreg').replaceWith(hidePassword);
            $('#passwordreg2').replaceWith(hidePassword2);
        }
    });


    $('#ajaxBut').click(function(e) {
        e.preventDefault();
        if($('#check-show-pw').attr('checked') == 'checked') {
            $('#check-show-pw').trigger('click');
        }
        var form = $('#ajaxBut').closest('form');
        $.ajax({
            type: "POST",
            url: "/functions/senddata.php",
            data: form.serialize(),
            success: function(data) {
                if(data == 0) {
                    $('#ajaxAnsw').html('<div class="errors">Ошибка отправки формы</div>');
                } else if (data == 1) {
                    $('#ajaxAnsw').html('<div class="go">Успешно зарегистровались</div>');
                } else if (data == 2) {
                    $('#ajaxAnsw').html('<div class="errors">Аккаунт уже создан</div>');
                } else if (data == 3) {
                    $('#ajaxAnsw').html('<div class="errors">Не поставили галочку</div>');
                } else if (data == 4) {
                    $('#ajaxAnsw').html('<div class="errors">Не ввели почту</div>');
                } else if (data == 5) {
                    $('#ajaxAnsw').html('<div class="errors">Короткий пароль</div>');
                } else if (data == 6) {
                    $('#ajaxAnsw').html('<div class="errors">Не совпадает пароль</div>');
                } else if (data == 7) {
                    $('#ajaxAnsw').html('<div class="errors">Не ввели имя</div>');
                } else if (data == 8) {
                    $('#ajaxAnsw').html('<div class="errors">Вы неправильно ввели электронную почту</div>');
                } else {
                    $('#ajaxAnsw').html('<div class="errors">Ошибка отправки формы</div>');
                }
            },
            error: function() {
                $('#ajaxAnsw').html('<div class="errors">Ошибка отправки формы</div>');
            }
        });
});

});