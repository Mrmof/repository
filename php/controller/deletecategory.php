<?php 
include $_SERVER['APP'];
include WEB_ROOT.'php/model/config.php';
include WEB_ROOT.'php/model/category.php';

$id = $_GET['id'];
$deletecategory = new Category();
$deletecategory->deletecategory($id);