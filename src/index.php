<?php require ('config/loader.php');

$page = new Page("Test");
$page->head();
$page->body();
Router::dispatch();
$page->foot();
