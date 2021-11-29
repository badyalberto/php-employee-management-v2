<?php

require_once CONFIG . "db.php";

class Database
{
	private string $host;
	private string $db;
	private string $user;
	private string $pass;
	private string $charset;

	public function __construct()
	{
		$this->host = DB_HOST;
		$this->db = 	DB_NAME;
		$this->user = DB_USER;
		$this->pass = DB_PASS;
		$this->charset = DB_CHARSET;
	}

	public function getDatabaseConnection(): PDO
	{
		$datasetName = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;

		return new PDO($datasetName, $this->user, $this->pass, [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES => false,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING,
		]);
	}
}
