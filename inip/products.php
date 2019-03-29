<h1>Заказ проектов</h1>
<?php
$res = do_query("SELECT * FROM `products`");
$out = "<div class='container'><div class='row'>";
foreach ($res as $item){
    $out .= "<div class='col-lg-4 col-xs-12'>
                <div class='container_block'>
                    <div class='container_block-head'>
                        <p class='h3 text-center'>".$item['name']."</p>
                    </div>
                    <div class='container_block-content'>
                    
                    </div>
                    <div class='container_block-footer'>
                        <div class='footer_content'>
                            <div class='footer_content-text'>
                                <p class='h4 text-center'>От ".$item['price']."</p>
                            </div> 
                            <div class='footer_content-form'>
                                <form action=''>
                                    <div class='form-group'>
                                        <button type='submit' name='".$item['id']."'>Закать</button>
                                    </div>
                                </form>
                            </div>
                       </div>
                    </div>
                </div>
            </div>";
}
$out .= '</div></div>';
echo $out;