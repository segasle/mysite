<h1 class="text-center">Блог</h1>
<div class="row">
    <div class="col-lg-3 col-xl-2">
        <div class="container">
            <script type="text/javascript" src="https://vk.com/js/api/openapi.js?161"></script>

            <!-- VK Widget -->
            <div id="vk_groups" style="display: table; margin: auto;"></div>
            <script type="text/javascript">
                VK.Widgets.Group("vk_groups", {mode: 3}, 180547513);
            </script>
        </div>
    </div>
    <?php
    /**
     * Created by PhpStorm.
     * User: sergej
     * Date: 26.11.18
     * Time: 14:48
     */
    echo post();
    ?>
</div>