<?php

require_once('./Sub.php');

class VeggieSub extends Sub 
{
	public function addPrimaryToppings()
	{
		var_dump('adding veggies');

		return $this;
	}

}