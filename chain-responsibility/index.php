<?php

abstract class HomeChecker {

	private $successor;
	abstract public function check(HomeStatus $home);

	public function next (HomeStatus $home) {
		if ($this->successor) {
			$this->successor->check($home);
		}
	}

	public function setSuccessor (HomeChecker $successor) {
		$this->successor = $successor;
	}
}

class Locks extends HomeChecker {
	public function check (HomeStatus $home) {
		echo "Checking Locks";
		if (!$home->isLocked) {
			throw new Exception('Locks are open. Abort!');
		}

		// check next
		$this->next($home);
	}
}

class Lights extends HomeChecker {
	public function check (HomeStatus $home) {
		echo "Checking Lights";
		if (!$home->isLightsOff) {
			throw new Exception('Lights are on. Abort!');
		}

		// check next
		$this->next($home);
	}
}

class Alarms extends HomeChecker {
	public function check (HomeStatus $home) {
		echo "Checking alarms";
		if (!$home->isAlarmsOn) {
			throw new Exception('Alarms are not on. Abort!');
		}

		// check next
		$this->next($home);
	}
}

class HomeStatus {
	public $isLocked = true;
	public $isLightsOff = true;
	public $isAlarmsOn = true;
}

$locks = new Locks;
$alarms = new Alarms;
$lights = new Lights;

$myHomeStatus = new HomeStatus;

$locks->setSuccessor($alarms);

$locks->check($myHomeStatus);



