<?php 
include $_SERVER['APP'];
include WEB_ROOT.'php/model/config.php';
include WEB_ROOT.'php/model/category.php';
include WEB_ROOT.'php/model/article.php';

$topic = htmlspecialchars($_POST['topic']);
$abstract = htmlspecialchars($_POST['abstract']);
$author = htmlspecialchars($_POST['author']);
$id = $_GET['id'];
$categoryId = $_GET['Cid'];
$addarticle = new Article();
$addarticle->editarticle($id, $categoryId, $topic, $abstract, $author);