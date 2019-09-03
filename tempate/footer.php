</div>
</main>
<footer>
    <div class="cellar">
        <div class="row">
            <div class="col-lg-3 col-xs-12">
                <div class="">
                    <p>Все права защищены &copy;<?php echo date('Y'); ?></p>
                </div>
            </div>
            <div class="col-lg-9 col-xs-12">
                <div class="block_icon">
                    <div class="img_icon">
                        <?php
                            $icon = do_query("SELECT * FROM `social_network`");
                            if (is_array($icon) || is_object($icon)) {
                                foreach ($icon as $item) {
                                    echo '<a href="' . $item['link'] . '" class="' . $item['class'] . ' fa-4x" target="_blank"></a>';
                                }
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script type="text/javascript" src="https://spikmi.com/Widget?Id=1610"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="javascript/main.js"></script>
</body>
</html>