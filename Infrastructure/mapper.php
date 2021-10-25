<?php

class Query 
{

	public function __construct()
	{
		$this->DBMS = 'mysql';
		$this->host = 'localhost';
		$this->db = 'logsis';
		$this->charset = 'utf8';
		$this->user = 'root';
		$this->password = '';

		$this->mySQL = $this->DBMS . ':host=' . $this->host . ';dbname=' . $this->db . ';charset=' . $this->charset;


		try {
			$this->connection = new PDO($this->mySQL, $this->user, $this->password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {

			echo $e->getMessage();

		}
	}
	public function getData()
	{
		$query = 'SELECT * 
				FROM writers_books
					RIGHT JOIN book
						ON writers_books.book_id = book.id
					LEFT JOIN writer
						ON writers_books.writer_id = writer.id';

		return $this->stm($query);
	}

	private function stm($SQL)
	{
		$stm = $this->connection->prepare($SQL);
		$stm->execute();
		$result = $stm->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

}