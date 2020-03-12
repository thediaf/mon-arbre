<?php

    require_once('Manager.php');
    class UserManager extends Manager
    {
        public function getUser($login, $pwd)
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT * FROM users WHERE login='$login' AND passWord = '$pwd';");

            return $req;
        }

        public function getUsers()
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT * FROM users ;");

            return $req;
        }

        public function getAdmin($idUser)
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT * FROM users WHERE id='$idUser';");
            $req = $req->fetch();
            return $req;
        }

        public function addUser($firstName, $lastName, $login, $passWord)
        {
            $db = $this->dbConnect();
            $req = $db->prepare("INSERT INTO users(firstName, lastName, login, passWord) VALUES(?, ?, ?, ?)"); 
            $req->execute(array($firstName, $lastName, $login, $passWord));
            
        }

        public function getNbrUsers()
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT COUNT(*) AS nbr FROM users;");
            $data = $req->fetch();
            $nb = $data['nbr'];
            
            return $nb;
        }

        public function updateUser($idUser, $firstName, $lastName, $login, $admin)
        {
            $db = $this->dbConnect();
            $req = $db->prepare("UPDATE users 
             SET firstName = :firstName,
                 lastName = :lastName,
                 login = :login,
                 admin = :admin
              WHERE id = :idUser;");
            //$data = $req->fetch();
            $req->execute(array(
                            'firstName'     => $firstName,
                            'lastName'      => $lastName,
                            'login'      => $login,
                            'admin' => $admin,
                            'idUser'      => $idUser
                        ));
            
        }
        
    }