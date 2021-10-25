<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '/View/View.php');

	$view = new View($_SERVER["REQUEST_URI"]);
	$view->constructPage($view->path);

	$books = $view->content->getBooks();
	$writers = $view->content->getWriters();

	include_once($_SERVER['DOCUMENT_ROOT'] . '/View/Scripts.php');
?>
