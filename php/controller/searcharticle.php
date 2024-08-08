<?php 
include $_SERVER['APP'];
include WEB_ROOT.'php/model/config.php';
include WEB_ROOT.'php/model/category.php';
include WEB_ROOT.'php/model/article.php';

$word = $_GET['word'];
$searchcategory = new Category();
$searchcategory->searchcategoryunderlist($word);

// $addarticle->addarticle($category, $topic, $abstract, $author, $file);