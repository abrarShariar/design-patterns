<?php

require_once('./Book.php');
require_once('./Kindle.php');
require_once('./Nook.php');
require_once('./eBookAdapter.php');

class Person 
{
	public function read (BookInterface $book)
	{
		$book->open();
		$book->turnPage();
	}
}

$myKindle = new eBookAdapter(new Kindle);
(new Person())->read($myKindle);

$myBook = new Book;
(new Person())->read($myBook);

$myNook= new eBookAdapter(new Nook);
(new Person())->read($myNook);
