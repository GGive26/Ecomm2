<?php
include("C:/wamp64/www/Ecomm2/models/class/client.php");

class modelUtulisateur
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function addUsers(Client $client)
    {
        $servername = "localhost";
        $username = 'root';
        $password = '';
        try {

            $conn = new PDO("mysql:host = $servername; dbname=projet-ecom2", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $nom = $client->getNom();
            $prenom = $client->getPrenom();
            $password = $client->getPassword();
            $role = $client->getRole_id();
            $email = $client->getEmail();
            // Requete preparer avec des marquer interrogatif
            $sth = $conn->prepare("INSERT INTO client VALUES (NULL,?,?,?,?,?);");
            $sth->execute(array(
                $nom,
                $prenom,
                $password,
                $role,
                $email
            ));
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function connecion($email, $passwordClient)
    {

        $servername = "localhost";
        $username = 'root';
        $password = '';
        try {

            $conn = new PDO("mysql:host = $servername; dbname=projet-ecom2", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $conn->prepare(" SELECT * FROM client WHERE email='" . $email . "' AND password='" . $passwordClient . "'");
            $sth->execute();
            //var_dump($sth);
            if ($sth->fetch()) {
                return true;
            } else {
                return false;
            };
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function getUserId($email)
    {

        $servername = "localhost";
        $username = 'root';
        $password = '';
        try {

            $conn = new PDO("mysql:host = $servername; dbname=projet-ecom2", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $conn->prepare(" SELECT role_id FROM client WHERE email=:email");
            $sth->bindParam(':email', $email);
            $sth->execute();

            $resultat = $sth->fetch(PDO::FETCH_ASSOC);

            if ($resultat) {
                return $resultat['role_id'];
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function getUserName($email)
    {

        $servername = "localhost";
        $username = 'root';
        $password = '';
        try {

            $conn = new PDO("mysql:host = $servername; dbname=projet-ecom2", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $conn->prepare(" SELECT nomClient FROM client WHERE email= :email");
            $sth->bindParam(':email', $email);
            $sth->execute();

            $resultat = $sth->fetch(PDO::FETCH_ASSOC);

            if ($resultat) {
                return $resultat['nomClient'];
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function getPrenom($email)
    {

        $servername = "localhost";
        $username = 'root';
        $password = '';
        try {

            $conn = new PDO("mysql:host = $servername; dbname=projet-ecom2", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $conn->prepare(" SELECT prenomClient FROM client WHERE email= :email");
            $sth->bindParam(':email', $email);
            $sth->execute();

            $resultat = $sth->fetch(PDO::FETCH_ASSOC);

            if ($resultat) {
                return $resultat['prenomClient'];
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function getPassword($email)
    {

        $servername = "localhost";
        $username = 'root';
        $password = '';
        try {

            $conn = new PDO("mysql:host = $servername; dbname=projet-ecom2", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $conn->prepare(" SELECT password FROM client WHERE email=:email");
            $sth->bindParam(':email', $email);
            $sth->execute();

            $resultat = $sth->fetch(PDO::FETCH_ASSOC);

            if ($resultat) {
                return $resultat['password'];
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function updateUser(Client $client)
    {
        $servername = "localhost";
        $username = 'root';
        $password = '';
        try {

            $conn = new PDO("mysql:host = $servername; dbname=projet-ecom2", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $nom = $client->getNom();
            $prenom = $client->getPrenom();
            $password = $client->getPassword();
            $email = $client->getEmail();
            // Requete preparer avec des marquer interrogatif
            $sth = $conn->prepare("UPDATE  client SET nomClient=:nom,prenomClient=:prenom,password=:password,email=:email;");
            $sth->bindParam(':nom', $nom);
            $sth->bindParam(':prenom', $prenom);
            $sth->bindParam(':email', $email);
            $sth->bindParam(':password', $password);
            $sth->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
