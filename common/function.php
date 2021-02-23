<?php
function p($str) {
	echo $str;	
}

function e(string $str, string $charset = 'UTF-8'): string {
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charset);
}

function getDB() {

	try {

		
	    $pdo = new PDO(
		    'mysql:dbname=heroku_dc6bcee06683c20;host=us-cdbr-east-02.cleardb.com;charset=utf8mb4',
	   	    'be79249baf2bce',
		    '032b4eaf',
	            [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		    ]
	);
	} catch (PDOException $e) {
		ob_start();
		header('Content-Type: text/plain; charset=UTF-8', true, 500);
		exit($e->getMessage());
		
    } ob_start();
      header('Content-Type: text/html; charset=utf-8');
	  return $pdo;
}


    function getURL() {
        return $_SERVER["REQUEST_URI"];
    }

    function getInfomation() {
        $urlarray = explode('/', getURL());
        $ID = $urlarray[3];
        return $ID;
    }
