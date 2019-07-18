<?php
require 'functions/db.php';
require 'api/vk.php';
require 'api/ok.php';
require 'api/fb.php';
require 'api/ya.php';
require 'functions/function.php';
user_login();
ok_authorization();
vk_authorization();
fb_authorization();
connections();