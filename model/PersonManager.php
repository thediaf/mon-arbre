<?php

    require_once('Manager.php');
    class PersonManager extends Manager
    {
        public function getPerson($firstName, $lastName, $birthDay)
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT * FROM persons WHERE firstName='$firstName' AND lastName = '$lastName' AND birthDay='$birthDay';");
            $data = $req->fetch();

            return $data;
        }

        public function getPers($idPerson)
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT * FROM persons WHERE  id='$idPerson';");
            $data = $req->fetch();

            return $data;
        }

        public function getPersons()
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT * FROM persons;");
            //$data = $req->fetch();

            return $req;
        }

        public function searchPerson($search)
        {
            $db = $this->dbConnect();
            $req = $db->query(
                "SELECT * FROM persons
                WHERE firstName LIKE '$search%'
                OR lastName LIKE '$search%'
                LIMIT 10");

            return $req;
        }

        public function addPerson($firstName, $lastName, $birthDay, $birthLocality, $sex, $description, $photo)
        {
            $db = $this->dbConnect();
            $req = $db->prepare("INSERT INTO persons(firstName, lastName, birthDay, birthLocality, sex, description, photo) VALUES(?, ?, ?, ?, ?, ?, ?)"); 
            $req->execute(array($firstName, $lastName, $birthDay, $birthLocality, $sex, $description, $photo));    
            
        }

        public function getNbrPersons()
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT COUNT(*) AS nbr FROM persons;");
            $data = $req->fetch();
            $nb = $data['nbr'];
            
            return $nb;
        }

        public function removePerson($idPerson)
        {
            $db = $this->dbConnect();
            $req = $db->prepare("DELETE FROM persons WHERE id = ?;");
            //$data = $req->fetch();
            $req->execute(array($idPerson));
            
        }

        public function updatePerson($idPerson, $firstName, $lastName, $birthDay, $birthLocality, $description, $photo)
        {
            $db = $this->dbConnect();
            $req = $db->prepare("UPDATE persons 
             SET firstName = :firstName,
                 lastName = :lastName,
                 birthDay = :birthDay,
                 birthLocality = :birthLocality,
                 description = :description,
                 photo = :photo
              WHERE id = :idPerson;");
            //$data = $req->fetch();
            $req->execute(array(
                            'firstName'     => $firstName,
                            'lastName'      => $lastName,
                            'birthDay'      => $birthDay,
                            'birthLocality' => $birthLocality,
                            'description'   => $description,
                            'photo'         => $photo,
                            'idPerson'      => $idPerson
                        ));
            
        }

        
    }