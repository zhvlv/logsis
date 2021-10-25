<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/Infrastructure/mapper.php');

class Controller
{
	private $query;
	private $data;
	public $books;
	public $writers;

	public function __construct($query)
	{
		$this->query = $query;
		$this->data = $this->sortData($this->query->getData());
		$this->books = $this->data['books'];
		$this->writers = $this->data['writers'];

	}

	public function sortData($data)
	{
		$books = [];
		$writers = [];

		foreach ($data as $key => $row) {
			$books[$key]['book_name'] = $row['book_name'];
			$books[$key]['price'] = $row['price'];
			$books[$key]['book_id'] = $row['book_id'];
			$books[$key]['writer_name'] = '';
			if($row['writer_name'] != null) {
				$writers[$key]['writer_name'] = $row['writer_name'];
				$writers[$key]['writer_id'] = $row['writer_id'];
			}
		}

		$books = array_unique($books, SORT_REGULAR);
		$books = array_values($books);

		$writers = array_unique($writers, SORT_REGULAR);
		$writers = array_values($writers);

		foreach ($data as $key => $row) {
			for ($i = 0; $i <= count($books) - 1; $i++) {
				if ($books[$i]['book_name'] == $row['book_name'])  {
					$books[$i]['writer_name'] .= ' ' . $row['writer_name'];
					$books[$i]['writer_id'][] = $row['writer_id'];
				}
			}
		}
		return ['books' => $books, 'writers' => $writers];
	}

}




