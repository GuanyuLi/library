<?php 
class book{
	private $book_id;
	private $book_name;
	private $author;
	private $publishing;
	private $category_id;
	private $date_in;
	private $price;
	private $quantity_in;
	private $quantity_out;
	private $quantity_loss;
	public function __construct($book_id,$book_name,$author,$publishing,$category_id,$price,$date_in,$quantity_in){
		$this->book_id = $book_id;
		$this->book_name = $book_name;
		$this->author = $author;
		$this->publishing = $publishing;
		$this->category_id = $category_id;
		$this->price = $price;
		$this->date_in = $date_in;
		$this->quantity_in = $quantity_in;
	}
}


?>