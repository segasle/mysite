<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><meta name="yandex-verification" content="8c72ad7d8c12c6d1" />

    <meta property="og:locale" content="ru_RU">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Сергей Слепенков - front-end разработчик">
    <meta property="og:description" content="ru_RU">
    <meta property="og:site_name" content="">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="Сергей Слепенков, front-end разработчик, верстальщик">
    <meta name="description" content="">
    <?php include 'functions/head.php';?>
    <title><?php echo $title;?></title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/style.css?t=<?php echo(microtime(true).rand()); ?>" media="screen">
    <!-- Yandex.Metrika counter -->

    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter51325486 = new Ya.Metrika2({
                        id:51325486,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/tag.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks2");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/51325486" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
<div class="cobtainer">
    <description>
        <div class="nenu"><div class="logo">
                <a href="?page=main">
                    <img src="img/logo.png" alt="">
                </a>
            </div>
            <input type="checkbox" id="checkbox">
            <label class="burger" for="checkbox">
                <div class="burger_open"></div>
            </label>
            <nav>

                <?php echo get_menu();?>
            </nav>

        </div>
    </description>
    <description>
        <div class="contain">

