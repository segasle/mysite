<?php
require 'functions/db.php';
require 'api/vk.php';
require 'api/ok.php';
require 'functions/function.php';
user_login();
vk_authorization();
connections();