<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/controller.php');

class View
{
	public $path;
	public $content;

	public function __construct($path)
	{
		$this->path = $path;
		$this->content = new Content(new Controller(new Query()));

	}

	public function constructPage($path)
	{
		switch ($path) {
			case '/':
				include_once($_SERVER['DOCUMENT_ROOT'] . '/View/Template/header.php');
				$this->content->getContent();
				include_once($_SERVER['DOCUMENT_ROOT'] . '/View/Template/footer.php');
				break;
			case '/index.php':
				include_once($_SERVER['DOCUMENT_ROOT'] . '/View/Template/header.php');
				$this->content->getContent();
				include_once($_SERVER['DOCUMENT_ROOT'] . '/View/Template/footer.php');
				break;
			default:
				echo 'Error 404';
				break;
		}
	}
}

class Content
{
	private $controller;

	public function __construct($controller)
	{
		$this->controller = $controller;
	}

	public function booksList($books)
	{
		print '<select name="book" id="book">' .
				'<option value="0">Выберите книгу</option>';

		foreach ($books as $book)
		{
			print '<option class="' . $book['book_id'] . '">' . $book['book_name'] . '</option>';
		}

		print '</select>';

		print '<p>Список авторов:</p>' .
			  '<p id="book_writers"></p>';
	}

	public function writersList($writers)
	{
		print '<select name="writer" id="writer">' .
			  '<option value="0">Выберите автора</option>';

		foreach ($writers as $writer)
		{
			print '<option class="' . $writer['writer_id'] . '" value="' . $writer['writer_id'] . '">' . $writer['writer_name'] . '</option>';
		}

		print '</select>';

		print '<p>Суммарная стоимость всех книг:</p>' .
			  '<p id="sum"></p>';
	}

	public function booksWithoutWriters($books)
	{
		print '<p>Книги без авторов:</p>' .
			  '<p id="withoutWriters"></p>';
	}

	public function getContent()
	{
		$this->booksList($this->controller->books);
		$this->writersList($this->controller->writers);
		$this->booksWithoutWriters($this->controller->books);
	}

	public function getBooks()
	{
		return $this->controller->books;
	}

	public function getWriters()
	{
		return $this->controller->writers;
	}
}