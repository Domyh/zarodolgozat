<?php	
	class CConnection
	{		
		public $pdo = '';
		
		public function __construct()
		{
			$this->connect();
		}
	
		public function connect()
		{
			$this->pdo = new PDO("mysql:host=localhost;dbname=domyh", 'root', '');
			$this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
		}
	}
	
	$db = new CConnection;
?>