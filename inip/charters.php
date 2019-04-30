<h1>Мои грамоты</h1>
<?php
global $token;
$content = file_get_contents("https://api.vk.com/method/photos.get?owner_id=176938709&album_id=241399093&rev=1&$token&v=5.60");
$elements = json_decode($content, true);
$out = '<div class="atbum row">';
foreach ($elements['response'] as $photo) {
    if (!empty(is_array($photo) || is_object($photo))) {
        foreach ($photo as $item) {
            //$data = date('d.m.Y H:m', $item['date']);
            $out .= '<div class="atbum_photo col-xs-12 col-sm-6 col-md-4 col-lg-2">'
                . '<img src="' . $item['photo_604'] . '" alt=""></div>';
        }
    }
}
$out .= '</div>';
echo $out;