<?php

class inject{

    function __construct() { }
    
    function  connect(){

         $servername = "localhost";
         $dbname="project injection";
         $username = "root";
         $password = "927640";
                try 
                    {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            return $conn;
                    }
    
                catch(PDOException $e)
                    {
                            echo "Connection failed: " . $e->getMessage();
                    }
    }

    function  deconnecter()
                { $conn = null; }
    
            }
?>
