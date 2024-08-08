<?php 
include $_SERVER['APP'];
include WEB_ROOT.'php/model/config.php';
include WEB_ROOT.'php/model/category.php';

$category = htmlspecialchars($_POST['category']);
$addcategory = new Category();
$addcategory->addcategory($category);