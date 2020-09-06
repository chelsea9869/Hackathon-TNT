<?php

class ConnectionManager {
   
    public function getConnection() {

        $host = "localhost";
        $username = "root";
        $dbname = "hackathon";
        $port = 3306;
	    $password = "ykJ7OaMCEexF"; 
        if(strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN'){
            $password = "root";
            $port = 8889;
	    }

        $url  = "mysql:host={$host};dbname={$dbname};port={$port}";
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);
        $conn = new PDO($url, $username, $password, $options);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $conn;
        
    }
    
}
