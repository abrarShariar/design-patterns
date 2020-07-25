<?php

interface Logger {

	public function log($data);
}

class LogToSaaS implements Logger {
	
	public function log($data) {
		var_dump("logging to a SaaS");
	}

}

class LogToFile implements Logger {

	public function log($data) {
		var_dump("logging to a file");
	}

}

class LogToXWebService implements Logger {

	public function log($data) {
		var_dump("logging to a web service");
	}
}

class App {

	public function log($data, Logger $logger) 
	{
		$logger->log($data);
	}
}

$app = new App;
$app->log('Hello', new LogToFile);