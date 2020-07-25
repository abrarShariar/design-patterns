<?php

require('./Book.php');
require('./KindleAdapter.php');

class Person 
{
	public function read (BookInterface $book)
	{
		$book->open();
		$book->turnPage();
	}
}

$myKindle = new KindleAdapter(new Kindle);
(new Person())->read($myKindle);

$myBook = new Book;
(new Person())->read($myBook);
