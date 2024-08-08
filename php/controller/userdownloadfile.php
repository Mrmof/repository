<?php 
include $_SERVER['APP'];
include WEB_ROOT.'php/model/config.php';
include WEB_ROOT.'php/model/category.php';
include WEB_ROOT.'php/model/article.php';
$id = $_GET['id'];
$categoryId = $_GET['Cid'];
$downloadfile = new Article();
$downloadfile->userdownloadfile($id);