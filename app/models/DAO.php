<?php

class DAO {
    
    protected $connection;
    
    // initialize the database connection using supplied information
    public function connect() {
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "password";
        $dbname = "currConverter";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        return $conn;
    }
    
    public function testConnection() {
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "pass";
        $dbname = "currConverter";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        if (!$conn) {
            return false;
        } else {
            return true;
        }
    }
    
    public function getSuccess($initCurr, $desExRate, $connect) {
        $sql = "SELECT ".$desExRate." FROM ".$initCurr;
        $result = $connect->query($sql);
        if($result == TRUE) {
            
                $display = "<br>selection was made <br>";
                return $display;
        } else {
            $display = "<br>no results";
            return $display;
        }
    }
    
    public function getExRate($initCurr, $desExRate, $connect) {
        $sql = "SELECT * FROM ".$initCurr;        
        if($result = $connect->query($sql)) {
           
            while($row = $result->fetch_assoc()) {
                $display = $row[$desExRate];
                return $display;
            }
            
            $display = "<br>" . $array[1] . "hi";
            return $display;
        } else {
            $display = "<br>query error";
            return $display;
        }
    }
    
    
}

?>
