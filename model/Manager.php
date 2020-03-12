<?php
    class Manager
    {
        protected function dbConnect()
        {   
            try {
                $db = new PDO('mysql:host=localhost;dbname=arbre;charset=utf8', 'root', '');
              //$db = new PDO('mysql:host=localhost;dbname=id11101485_arbre;charset=utf8', 'id11101485_root', 'thediaff98');
            
                return $db;
            } 
            catch(Exception $e){
                echo "Connection failed: " . $e->getMessage();
            }
            
        }
    }



 