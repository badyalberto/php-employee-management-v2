<?php

abstract class Model
{
	protected Database $database;

	public function __construct()
	{
		$this->database = new Database();
	}
}
