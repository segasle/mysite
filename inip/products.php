<h1>Заказ проектов</h1>
<?php
$res = do_query("SELECT * FROM `products`");
$out = "<div class='container'><div class='row'>";
foreach ($res as $item){
    $id = $item['id'];
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
                                <p class='h4 text-center'>От ".$item['price']."руб</p>
                            </div> 
                            <div class='footer_content-form'>
                                <form action='' method='post'>
                                    <div class='form-group'>
                                        <button type='submit' class='btn w-100' name='".$id."'>Заказать</button>
                                    </div>
                                </form>
                            </div>
                       </div>
                    </div>
                </div>
            </div>";
    if (isset($_POST[$id])){
        if (!isset($_SESSION['data'])){
            echo '<div class="container">
                    <form action="">
                        <div class="form-group">
                           <label for=""><p>Имя</p></label> 
                            <input type="email" class="form-control" placeholder="Имя" name="name">
                        </div>
                        <div class="form-group">
                           <label for=""><p>Email</p></label>
                            <input type="email" class="form-control" placeholder="Почта" name="email"> 
                        </div>
                        <div class="form-group">
                           <label for=""><p>Сообщение</p></label>
                            <textarea class="form-control" name="message"></textarea> 
                        </div>
                        <button type="submit" class="btn" name="order">Отправить</button>
                    </form>
            </div>';
        }else{
            $data = do_query("SELECT * FROM `users` WHERE email = '{$_SESSION['email']}'");
        }
           }
}
$out .= '</div></div>';
echo $out;
