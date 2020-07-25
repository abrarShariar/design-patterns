<?php

require_once('./Sub.php');

class TurkeySub extends Sub
{

	public function addPrimaryToppings()
	{
		var_dump('adding turkey');

		return $this;
	}

}