<?php 
include $_SERVER['APP'];
include WEB_ROOT.'php/model/config.php';
include WEB_ROOT.'php/model/user.php';

$id = $_GET['id'];

$changestatus = new User();
$changestatus->changestatus($id);