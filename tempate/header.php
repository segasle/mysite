<?php
if (isset($_SESSION['data'])) {
    if (isset($_POST['esc'])) {
        unset($_SESSION['data']);
        header("location: ?page=main");
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <?php include 'functions/head.php'; ?>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="yandex-verification" content="1828ff9bd0a32839"/>
    <meta property="og:locale" content="ru_RU">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Сергей Слепенков - back-end разработчик">
    <meta property="og:description" content="ru_RU">
    <meta property="og:site_name" content="">
    <meta name="robots" content="index, follow">
    <meta name="keywords"
          content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $description; ?>">

    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="icons/css/all.css">
    <link rel="stylesheet" href="icons/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/style.css?t=<?php echo(microtime(true) . rand()); ?>">
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(51832964, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/51832964" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '398843257654116',
                cookie     : true,
                xfbml      : true,
                version    : 'v3.3'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="cobtainer">
        <header>
            <div class="nenu">
                <div class="logo">
                    <a href="?page=main">
                        <img src="img/logo.png" alt="">
                    </a>
                </div>
                <input type="checkbox" id="checkbox">
                <label class="burger label-none" for="checkbox">
                    <div class="burger_open"></div>
                </label>
                <nav>
                    <?php echo get_menu(); ?>
                </nav>
                <?php if (!isset($_SESSION['data'])) { ?>
                    <div class="btn-author">

                        <button type="button" class="btn" data-toggle="modal" data-target="#myModal2">
                            Регистрация
                        </button>
                        <button type="button" class="btn" data-toggle="modal" data-target="#myModal">
                            Вход
                        </button>
                    </div>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="h4">Вход</p>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php login(); ?>

                                    <form action="" method="post">
                                        <div class="form_grog">
                                            <div class="form_grog-text">
                                                <p>Email</p>
                                            </div>
                                            <input type="email" class="form-control" name="email"
                                                   placeholder="Введите Email"
                                                   value="<?php echo @$_POST['email']; ?>">
                                        </div>
                                        <div class="form_grog">
                                            <div class="form_grog-text">
                                                <p>Пароль</p>
                                            </div>
                                            <input type="password" class="form-control" name="password"
                                                   placeholder="Введите пароль">
                                        </div>
                                        <div class="form_grog">
                                            <button type="submit" class="btn w100" name="submit">Войти</button>
                                        </div>
                                    </form>
                                    <div class="recovery">

                                        <button type="button" class="btn float-right" data-toggle="modal"
                                                data-target="#myModal3">
                                            Забыли пароль?
                                        </button>
                                    </div>
                                    <p>Или авторизуйтесь с помощью соц сети</p>
                                    <?php echo link_authorization(); ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Регистрация</h4>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php reg(); ?>
                                    <form action="" method="post">
                                        <div class="form_grog">
                                            <div class="form_grog-text">
                                                <p>Email</p>
                                            </div>
                                            <input type="email" class="form-control" name="emailreg"
                                                   placeholder="Введите Email"
                                                   value="<?php echo @$_POST['emailreg']; ?>">
                                        </div>
                                        <div class="form_grog">
                                            <div class="form_grog-text">
                                                <p>Пароль</p>
                                            </div>
                                            <input type="password" class="form-control" name="passwordreg"
                                                   placeholder="Введите пароль">
                                        </div>
                                        <div class="form_grog">
                                            <div class="form_grog-text">
                                                <p>Подтыердите пароль</p>
                                            </div>
                                            <input type="password" class="form-control" name="passwordreg2"
                                                   placeholder="Введите пароль">
                                        </div>
                                        <div class="form_grog">
                                            <div class="form_grog-text">
                                                <p>Как вас зовут?</p>
                                            </div>
                                            <input type="text" class="form-control" name="namereg"
                                                   placeholder="Введите имя"
                                                   value="<?php echo @$_POST['namereg']; ?>">
                                        </div>
                                        <div class="checkbox">
                                            <label for="">
                                                <input type="checkbox" name="check">Вы должны согласиться на обработку
                                                персональных данных
                                            </label>
                                        </div>
                                        <div class="form_grog">
                                            <button type="submit" class="btn w100" name="submitreg">Регистрация</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="h4 modal-title">Восстановление пароля</p>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php recovery(); ?>
                                    <form action="" method="post">
                                        <div class="form_grog">
                                            <div class="form_grog-text">
                                                <p>Email</p>
                                            </div>
                                            <input type="email" class="form-control" name="emailrecovery"
                                                   placeholder="Введите Email"
                                                   value="<?php echo @$_POST['emailrecovery']; ?>">
                                        </div>
                                        <div class="form_grog">
                                            <div class="form_grog-text">
                                                <p>Пароль</p>
                                            </div>
                                            <input type="password" class="form-control" name="passwordrecovery"
                                                   placeholder="Введите пароль">
                                        </div>
                                        <div class="form_grog">
                                            <div class="form_grog-text">
                                                <p>Подтыердите пароль</p>
                                            </div>
                                            <input type="password" class="form-control" name="passwordrecovery2"
                                                   placeholder="Введите пароль">
                                        </div>
                                        <div class="form_grog">
                                            <button type="submit" class="btn w100" name="submitrecovery">Восстановить
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <form action="" method="post">
                        <button type="submit" name="esc" class="btn-author btn">Выход</button>
                    </form>
                <?php } ?>
            </div>
        </header>

        <div class="contain">