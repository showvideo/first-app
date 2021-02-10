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

	function searchName($names) {
		if(!empty($names)){
			return $names; 
		} else {
			return $names = 0; } 
	}
    

    function anime_title() {

        $sql = "SELECT animenon, title
                FROM anime_title
                WHERE category=1";
        
        $stmt = getDB()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
        
    }
	

		
    function table_title($title) {

        echo('	
        <th style = "width:66px;height:35px;line-height:13px;background-color:white;display:inline-block;
        padding:6px;font-size:12px;">
        <a href="/title/'.$title["animenon"].'/" style = "text-decoration:none;" >'."".$title["title"].'
        </a></th>
        ');
    }


    function anitl() {
        
        $sql = "SELECT aninon, name, comment, createdy
                FROM anime_thread
                WHERE 1
                LIMIT 0,5";
        
        $stmt = getDB()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;

    }

    function table_titles($tl) {

        echo('	
        <p style = "border:ridge;width:100px;height:100px;background-color:white;margin-left:50px;display:inline-block;
        padding:2px;font-size:12px;">
        <a href="/anime/title/'.$tl["aninon"].'/" style = "text-decoration:none;" >'."".$tl["comment"].'
        </a></th></br>
        ');
    }

    function anititle() {

        $sql = "SELECT animenon, title
                FROM anime_title
                WHERE animenon = :animenon
                ORDER BY animenon";
        
        $stmt = getDB()->prepare($sql);
        $stmt->bindParam(':animenon', $animenon, PDO::PARAM_STR);
        $stmt->execute();
        $anititle = $stmt->fetchAll();

        return $anititle;
    }
    
    function getcommentlists() {
        
        $sql = "SELECT aninon, name, comment, updatady
                FROM anime_thread
                WHERE aninon = :aninon
                ORDER BY aninon";

        $stmt = getDB()->prepare($sql);
        $stmt->bindParam(':aninon', $aninon, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }

    function ani_TL($tl) {

        echo('	
        <p>'."".$tl["comment"].'</p>
        ');
    }

    function responselist($aninon) {

        $sql = "SELECT aninon, name, comment, updatedy
                FROM anime_thread
                WHERE aninon = :aninon
                ORDER BY aninon";
        
        $stmt = getDB()->prepare($sql);
        $stmt->bindParam(':aninon', $aninon, PDO::PARAM_STR);
        $stmt->execute();
        $responselist = $stmt->fetchAll();
        return $responselist;

    }

    function outputresponse($response) {
        $name  =$response["name"];

        echo('
            <span style = "font-size:18px;padding-left:35px;padding-bottom:20px;">
			'.$name."の掲示板".'
			
			</span>
        ');
    }

    function anicome($aninon) {

        $sql = "SELECT aninon, name, comment, createdy
                FROM anime_thread
                WHERE aninon = :aninon
                ORDER BY aninon";

        $stmt = getDB()->prepare($sql);
        $stmt->bindParam(':aninon', $aninon, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function response ($anicome) {

        $name = $anicome['name'];
        $comment = $anicome['comment'];
        $createdy = $anicome['createdy'];

        echo('
        <p style = "border:ridge;width:200px;height:100px;margin-left:50px;">'.$name.'.'.$comment.'</p>
        ');
    }