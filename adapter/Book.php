<?php

require_once('./BookInterface.php');

class Book implements BookInterface {

	public function open ()
	{
		var_dump('opening the paper book');
	}

	public function turnPage ()
	{
		var_dump('turning the page of the paper book.');
	}

}