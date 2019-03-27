<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="yandex-verification" content="1828ff9bd0a32839"/>
    <meta property="og:locale" content="ru_RU">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Сергей Слепенков - front-end разработчик">
    <meta property="og:description" content="ru_RU">
    <meta property="og:site_name" content="">
    <meta name="robots" content="index, follow">
    <meta name="keywords"
          content="Сергей Слепенков, front-end разработчик, верстальщик, web-программист, web-дизайнер, программист">
    <meta name="description" content="">
    <?php include 'functions/head.php'; ?>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/style.css?t=<?php echo(microtime(true) . rand()); ?>" media="screen">

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
            id: 51832964,
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

</head>
<body>
<div class="cobtainer">
    <description>
        <div class="nenu">
            <div class="logo">
                <a href="?page=main">
                    <img src="img/logo.png" alt="">
                </a>
            </div>
            <input type="checkbox" id="checkbox">
            <label class="burger" for="checkbox">
                <div class="burger_open"></div>
            </label>
            <nav>

                <?php echo get_menu(); ?>
            </nav>
            <button type="button" class="btn btn-author" data-toggle="modal" data-target="#myModal">Авторизоваться</button>

            <!-- Модальное окно -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </description>
    <description>
        <div class="contain">

