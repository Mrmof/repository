<?php 
include $_SERVER['APP'];
include WEB_ROOT.'php/model/config.php';
include WEB_ROOT.'php/model/category.php';
include WEB_ROOT.'php/model/article.php';

$topic = htmlspecialchars($_POST['topic']);
$abstract = htmlspecialchars($_POST['abstract']);
$category = htmlspecialchars($_POST['category']);
$author = htmlspecialchars($_POST['author']);
$file = $_FILES['fileOfArticle'];
$addarticle = new Article();
$addarticle->addarticle($category, $topic, $abstract, $author, $file);